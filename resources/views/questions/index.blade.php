<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  {{-- Tailwind --}}
  @vite('resources/css/app.css')
  <script src="https://unpkg.com/feather-icons"></script>
  <title>Question</title>
</head>
<body class="bg-gradient-to-br from-white via-teal-50 to-slate-100 min-h-screen">
  <section id="question" class="flex w-full min-h-screen justify-center items-center">
    <div class="md:w-2/3 w-[95vw] max-w-2xl mx-auto" id="question-content">
      {{-- Konten soal akan di-render oleh JS --}}
    </div>
  </section>

  <script>
    const questions = @json($questions);

    let currentIndex = 0;
    let answers = new Array(questions.length).fill(null);
    let correctAnswers = new Array(questions.length).fill(null);
    const questionContent = document.getElementById('question-content');

    function renderQuestion(index) {
      const q = questions[index];
      if (!q) return;

      questionContent.innerHTML = `
        <div class="bg-white/90 rounded-3xl shadow-2xl px-8 py-10 border border-teal-100 animate-fade-in">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-2">
            <div>
              <h1 class="md:text-3xl text-2xl text-slate-800 font-bold tracking-tight">${q.level.name}</h1>
              <h2 class="md:text-xl text-lg text-teal-500 font-semibold mt-1">${q.subject.name}</h2>
              <h3 class="md:text-base text-sm text-slate-600 font-mono mt-1">Kategori: ${q.category.name}</h3>
            </div>
            <div class="flex gap-2 items-center">
              <span class="text-xs md:text-sm text-slate-500 bg-teal-100 px-3 py-1 rounded-full font-semibold">${index + 1} / ${questions.length}</span>
              <div class="relative group cursor-pointer" id="score-rules">
                <span class="flex items-center gap-1 text-red-700 font-bold text-xs md:text-sm hover:underline">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-4m0-4h.01" /></svg>
                  Aturan Skor
                </span>
                <div class="absolute hidden flex-col items-start bg-red-50 rounded-2xl border border-red-800 w-56 py-2 px-4 right-0 top-8 z-20 shadow-xl transition-all duration-200" id="score-container">
                  <h6 class="font-medium text-shadow-sm text-red-800">Benar = +1 Point</h6>
                  <h6 class="font-medium text-shadow-sm text-red-800">Salah = -1 Point</h6>
                  <h6 class="font-medium text-shadow-sm text-red-800">Tidak Jawab = -1 Point</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full bg-slate-200 h-[6px] rounded-full mt-2 mb-6 overflow-hidden">
            <div class="bg-gradient-to-r from-teal-400 to-teal-600 h-full rounded-full transition-all duration-300" style="width:${((index + 1) / questions.length) * 100}%;"></div>
          </div>
          <div class="mb-6">
            <h3 class="md:text-lg text-base font-semibold text-slate-800 mb-2">Soal:</h3>
            <div class="text-slate-700 md:text-lg text-base font-normal">${q.content}</div>
          </div>
          <div class="flex flex-col gap-3 mt-2">
            ${['A', 'B', 'C', 'D'].map((opt, i) => `
              <button type="button"
                class="option w-full text-left px-6 py-3 rounded-xl border border-slate-200 bg-slate-100 hover:bg-teal-100 hover:border-teal-400 transition-all duration-150 font-medium text-slate-700 flex items-center gap-3 shadow-sm"
                data-opt="${opt}">
                <span class="inline-block w-7 h-7 rounded-full border-2 border-teal-300 flex items-center justify-center font-bold text-teal-500 bg-white">${opt}</span>
                <span>${q['option_' + opt.toLowerCase()]}</span>
              </button>
            `).join('')}
          </div>
          <div class="flex gap-2 justify-end mt-8">
            <button id="prev-btn" onclick="previousQuestion()" class="flex gap-1 items-center justify-center bg-teal-500 rounded-3xl px-5 py-2 hover:opacity-80 text-white font-semibold shadow transition">
              <i data-feather="arrow-left" class="md:w-6 md:h-6 w-4 h-4"></i>
              <span class="font-mono md:text-base text-sm">Sebelumnya</span>
            </button>
            <button id="next-btn" onclick="nextQuestion()" class="flex gap-1 items-center justify-center bg-teal-500 rounded-3xl px-5 py-2 hover:opacity-80 text-white font-semibold shadow transition">
              <span class="font-mono md:text-base text-sm">Selanjutnya</span>
              <i data-feather="arrow-right" class="md:w-6 md:h-6 w-4 h-4"></i>
            </button>
            <button id="submit-btn" onclick="submitQuestion()" class="hidden flex gap-1 items-center justify-center bg-slate-800 rounded-3xl px-5 py-2 hover:opacity-80 text-teal-100 font-semibold shadow transition">
              <span class="font-mono md:text-base text-sm">Selesai</span>
              <i data-feather="arrow-right" class="md:w-6 md:h-6 w-4 h-4"></i>
            </button>
          </div>
        </div>
      `;

      // Handle tombol navigasi
      const prevBtn = document.querySelector('#prev-btn');
      const nextBtn = document.querySelector('#next-btn');
      const submitBtn = document.querySelector('#submit-btn');

      prevBtn.classList.toggle('hidden', currentIndex === 0);
      nextBtn.classList.toggle('hidden', currentIndex === questions.length - 1);
      submitBtn.classList.toggle('hidden', currentIndex !== questions.length - 1);

      // Jawaban yang dipilih
      const options = [...document.querySelectorAll('.option')];
      const savedAnswer = answers[currentIndex];
      if (savedAnswer) {
        const selectedIndex = ['A', 'B', 'C', 'D'].indexOf(savedAnswer);
        if (selectedIndex !== -1) {
          options[selectedIndex].classList.add('bg-teal-400', 'border-teal-600', 'text-white');
        }
      }

      for (let i = 0; i < options.length; i++) {
        options[i].addEventListener('click', function () {
          for (let j = 0; j < options.length; j++) {
            options[j].classList.remove('bg-teal-400', 'border-teal-600', 'text-white');
            options[j].classList.add('bg-slate-100', 'border-slate-200', 'text-slate-700');
          }

          options[i].classList.remove('bg-slate-100', 'border-slate-200', 'text-slate-700');
          options[i].classList.add('bg-teal-400', 'border-teal-600', 'text-white');

          answers[currentIndex] = ['A', 'B', 'C', 'D'][i];

          if(answers[currentIndex] === q.correct_answer){
            correctAnswers[currentIndex] = 'BENAR';
          } else{
            correctAnswers[currentIndex] = 'SALAH';
          }
        });
      }

      feather.replace();
      initScoreToggle();
    }

    function showScore(score, persentageScore, correct, wrong, nul, total){
      questionContent.innerHTML = `
        <div class="mx-auto bg-white/90 rounded-3xl shadow-2xl py-10 px-8 border border-teal-100 animate-fade-in text-center">
          <h1 class="font-bold md:text-2xl text-xl text-teal-600 mb-2">Selamat, kamu sudah menyelesaikan Tryout!</h1>
          <h3 class="text-slate-700 font-medium mt-2 md:text-lg text-md">Total skor tryout kamu:</h3>
          <div class="flex justify-center mt-6 mb-2">
            <span class="inline-block bg-gradient-to-r from-teal-400 to-teal-600 text-white font-bold rounded-full px-8 py-4 text-5xl shadow-lg">${score}</span>
          </div>
          <h3 class="text-slate-700 font-medium mt-2 md:text-lg text-md">Persentase skor:</h3>
          <div class="flex justify-center mt-2 mb-4">
            <span class="inline-block bg-slate-800 text-teal-100 font-bold rounded-full px-8 py-2 text-3xl shadow">${persentageScore.toFixed(2)}%</span>
          </div>
          <div class="flex flex-wrap justify-center gap-4 mt-4 mb-6">
            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">Benar: ${correct}</span>
            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">Salah: ${wrong}</span>
            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-semibold">Tidak dijawab: ${nul}</span>
            <span class="bg-slate-200 text-slate-700 px-4 py-2 rounded-full font-semibold">Total: ${total}</span>
          </div>
          <a href="/" class="mt-8 inline-block px-8 py-3 bg-teal-500 text-white rounded-2xl text-xl font-medium shadow hover:bg-teal-600 transition">Selesai</a>
        </div>
      `;
    }

    function previousQuestion() {
      if (currentIndex > 0) {
        currentIndex--;
        renderQuestion(currentIndex);
      }
    }

    function nextQuestion() {
      if (currentIndex < questions.length - 1) {
        currentIndex++;
        renderQuestion(currentIndex);
      }
    }

    function submitQuestion() {
      let score = 0;
      let persentageScore = 0;
      let correct = 0;
      let wrong = 0;
      let nul = 0;
      let total = 0;
      correctAnswers.map(answer => {
        total += 1;
        if(answer === 'BENAR'){
          score += 1;
          correct += 1;
        } else{
          score -= 1;
          if(!answer){
            nul += 1;
          } else{
            wrong += 1;
          }
        }
      })

      persentageScore = (score / total) * 100

      if(persentageScore < 0){
        persentageScore = 0;
      }

      storeHistory(score, persentageScore, correct, total);
      showScore(score, persentageScore, correct, wrong, nul, total);

    }

    function storeHistory(score, persentageScore, correct, total){
      const CURRENT_USER_ID = {{ Auth::user()->id }};
      const CURRENT_LEVEL_ID = {{ $level->id }};
      const CURRENT_SUBJECT_ID = {{ $subject->id }};

      const data = {
        user_id: CURRENT_USER_ID,
        level_id: CURRENT_LEVEL_ID,
        subject_id: CURRENT_SUBJECT_ID,
        score: score,
        persentage_score: persentageScore,
        total_questions: total,
        correct_answer: correct,
      }

      fetch('/histories', {
        method: 'POST',
        headers: {
          'Content-Type' : 'application/json',
          'X-CSRF-TOKEN' : '{{ csrf_token() }}'
        },
        body: JSON.stringify(data)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error("HTTP error " + response.status);
        }
        return response.json();
      })
      .then(result => {
        console.log('data berhasil disimpan', result);
      })
      .catch(error => {
        console.log('gagal menyimpan data', error);
      });
    }

    function initScoreToggle() {
      const scoRules = document.querySelector("#score-rules");
      const scoContainer = document.querySelector("#score-container");

      if (!scoRules || !scoContainer) return;

      scoRules.addEventListener("mouseenter", () => {
        if (window.innerWidth >= 768) {
          scoContainer.classList.remove("hidden");
          scoContainer.classList.add("flex");
        }
      });

      scoRules.addEventListener("mouseleave", () => {
        if (window.innerWidth >= 768) {
          scoContainer.classList.add("hidden");
          scoContainer.classList.remove("flex");
        }
      });

      scoRules.addEventListener("click", () => {
        if (window.innerWidth <= 768) {
          scoContainer.classList.toggle("hidden");
          scoContainer.classList.toggle("flex");
        }
      });
    }

    renderQuestion(currentIndex);
  </script>

  <script>
    feather.replace();
  </script>

  <style>
    .animate-fade-in {
      animation: fadeIn 0.5s;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px);}
      to { opacity: 1; transform: translateY(0);}
    }
  </style>
</body>
</html>
