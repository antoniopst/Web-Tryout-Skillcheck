@extends('layouts.main')
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="pt-36 pb-28 bg-gradient-to-b from-sky-100 to-white">
  <div class="container max-w-screen-xl mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center gap-10">
      <!-- Text -->
      <div class="md:w-1/2 text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 leading-tight">
          <span class="bg-gradient-to-r from-sky-500 to-teal-500 text-transparent bg-clip-text">
            Tryout Online
          </span><br>Berbasis CBT dan Penilaian Otomatis
        </h1>
        <p class="text-slate-700 text-base md:text-lg font-medium mt-6">
          Persiapan maksimal menghadapi ujian nasional dan masuk perguruan tinggi, kapan saja di mana saja.
        </p>
        <p class="text-slate-500 text-sm md:text-base mt-3">
          Dilengkapi timer, acak soal, review hasil, dan cetak sertifikat digital.
        </p>
        <a href="/register" class="inline-block px-8 py-3 rounded-xl bg-purple-500 mt-8 text-white font-semibold text-lg shadow-lg hover:bg-purple-600 transition">
          Daftar Sekarang
        </a>
      </div>

      <!-- Image -->
      <div class="md:w-1/2">
        <img src="{{ asset('img/hero.svg') }}" alt="Hero Image" class="w-full max-w-md mx-auto animate-fade-in drop-shadow-xl">
      </div>
    </div>
  </div>
</section>

<!-- Section Advantage -->
<section class="py-20 bg-slate-50">
  <div class="container max-w-screen-xl mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-3xl font-bold text-slate-800">Kenapa Memilih Kami?</h2>
      <p class="text-slate-600 mt-2 max-w-2xl mx-auto">Fitur terbaik yang dirancang sesuai kebutuhan siswa dan lembaga pendidikan.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
      <!-- Feature 1 -->
      <div class="text-center group">
        <div class="bg-sky-500 p-5 rounded-full w-20 h-20 mx-auto flex justify-center items-center shadow-md group-hover:scale-110 transition">
          <i data-feather="clock" class="text-white w-8 h-8"></i>
        </div>
        <h4 class="text-xl font-semibold text-slate-800 mt-6">Timer Otomatis</h4>
        <p class="text-slate-600 mt-2">Waktu pengerjaan dihitung secara real-time dan otomatis.</p>
      </div>
      <!-- Feature 2 -->
      <div class="text-center group">
        <div class="bg-teal-500 p-5 rounded-full w-20 h-20 mx-auto flex justify-center items-center shadow-md group-hover:scale-110 transition">
          <i data-feather="shuffle" class="text-white w-8 h-8"></i>
        </div>
        <h4 class="text-xl font-semibold text-slate-800 mt-6">Soal Acak</h4>
        <p class="text-slate-600 mt-2">Soal dan jawaban diacak untuk setiap peserta.</p>
      </div>
      <!-- Feature 3 -->
      <div class="text-center group">
        <div class="bg-yellow-400 p-5 rounded-full w-20 h-20 mx-auto flex justify-center items-center shadow-md group-hover:scale-110 transition">
          <i data-feather="check-circle" class="text-white w-8 h-8"></i>
        </div>
        <h4 class="text-xl font-semibold text-slate-800 mt-6">Penilaian Otomatis</h4>
        <p class="text-slate-600 mt-2">Hasil langsung keluar setelah submit.</p>
      </div>
    </div>
  </div>
</section>

<!-- Section Achievement -->
<section class="py-20 bg-white">
  <div class="container max-w-screen-xl mx-auto px-4">
    <div class="flex flex-col md:flex-row justify-around items-center text-center gap-12">
      <!-- Stat 1 -->
      <div>
        <h3 class="text-4xl font-bold text-sky-500">12+</h3>
        <p class="text-slate-600">Tryout Dirilis</p>
      </div>
      <!-- Stat 2 -->
      <div>
        <h3 class="text-4xl font-bold text-teal-500">950+</h3>
        <p class="text-slate-600">Pengguna Aktif</p>
      </div>
      <!-- Stat 3 -->
      <div>
        <h3 class="text-4xl font-bold text-purple-500">100%</h3>
        <p class="text-slate-600">Gratis & Online</p>
      </div>
    </div>
  </div>
</section>

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
  feather.replace()
</script>
@endsection
