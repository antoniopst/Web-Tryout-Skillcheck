@extends('layouts.main')

@section('container')
<!-- Hero Section Start -->
<section class="pt-40 pb-20 bg-gradient-to-b from-white to-teal-50">
  <div class="container mx-auto px-4 max-w-4xl text-center">
    <h1 class="text-4xl md:text-6xl font-bold text-teal-600 leading-snug">Tentang <span class="text-slate-800">Skillcheck.</span></h1>
    <p class="mt-8 text-lg text-slate-700 font-medium">
      SKILLCHECK adalah platform latihan online yang dirancang untuk membantu Anda mempersiapkan ujian SMA dan ujian masuk perguruan tinggi (UTBK dan lainnya) dengan lebih baik.
    </p>
    <p class="mt-4 text-lg text-slate-700 font-medium">
      Kami menyediakan soal latihan yang relevan dan terkini, lengkap dengan pembahasan, untuk berbagai ujian seperti UTBK, SBMPTN, serta ujian mandiri.
    </p>
  </div>
</section>
<!-- Hero Section End -->

<!-- Why Section Start -->
<section id="why" class="py-20 bg-slate-900">
  <div class="container mx-auto px-6 max-w-5xl">
    <div class="bg-slate-800 rounded-3xl py-12 px-8 md:px-16 shadow-xl">
      <h2 class="text-3xl md:text-4xl font-semibold text-teal-400 text-center">Mengapa Memilih SKILLCHECK?</h2>

      <div class="mt-10 space-y-8">
        <div class="flex items-start gap-4">
          <div class="bg-teal-500 rounded-full p-3">
            <i data-feather="check" class="w-6 h-6 text-white"></i>
          </div>
          <p class="text-white text-base md:text-lg font-medium">
            Soal latihan yang lengkap dan selalu diperbarui sesuai dengan perkembangan terbaru.
          </p>
        </div>
        <div class="flex items-start gap-4">
          <div class="bg-teal-500 rounded-full p-3">
            <i data-feather="check" class="w-6 h-6 text-white"></i>
          </div>
          <p class="text-white text-base md:text-lg font-medium">
            Pembahasan soal mendalam untuk membantu pemahaman konsep dengan lebih baik.
          </p>
        </div>
        <div class="flex items-start gap-4">
          <div class="bg-teal-500 rounded-full p-3">
            <i data-feather="check" class="w-6 h-6 text-white"></i>
          </div>
          <p class="text-white text-base md:text-lg font-medium">
            Simulasi ujian berbasis komputer untuk pengalaman ujian yang realistis.
          </p>
        </div>
      </div>
    </div>

    <p class="mt-16 text-center text-slate-200 text-base md:text-lg font-medium max-w-3xl mx-auto">
      Bersama SKILLCHECK, persiapan ujian jadi lebih terarah dan menyenangkan. Raih impian masuk kampus favoritmu dengan belajar yang cerdas dan efisien!
    </p>
  </div>
</section>
<!-- Why Section End -->
@endsection
