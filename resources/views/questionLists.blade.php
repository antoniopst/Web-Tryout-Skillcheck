@extends('layouts.main')

@section('container')
    @auth
        <!-- Question Group Start -->
        <section class="pt-32 pb-22 min-h-screen bg-gradient-to-br from-white via-teal-50 to-slate-100">
            <div class="container max-w-5xl mx-auto px-4">
                <h1 class="md:text-5xl text-3xl font-bold text-center mb-4 text-slate-900 tracking-tight drop-shadow">
                    Kelompok <span class="text-teal-500">Soal</span>
                </h1>
                <p class="md:mt-6 mt-3 md:mb-12 mb-8 text-slate-700 font-medium text-center md:text-lg text-base max-w-2xl mx-auto">
                    Yuk, pilih soal sesuai jenjang kamu! Tersedia latihan seru mulai dari SD, SMP, SMA, sampai tryout CPNS.
                    Asah kemampuan di berbagai mata pelajaran seperti IPA, Bahasa Inggris, dan banyak lagi.
                    <span class="inline-block animate-bounce text-teal-500">👇</span>
                </p>
                <div class="space-y-12">
                    @foreach ($levels as $level)
                        <div class="bg-white/90 rounded-2xl shadow-xl p-8 border border-teal-100 transition hover:shadow-2xl">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="bg-gradient-to-br from-teal-400 to-teal-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg text-3xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                                    </svg>
                                </div>
                                <h3 class="text-slate-900 md:text-3xl font-semibold text-2xl tracking-tight">
                                    {{ $level->name }}
                                </h3>
                            </div>
                            <div class="flex flex-wrap gap-4">
                                @foreach ($level->subjects as $subject)
                                    <a href="/question/{{ $level->slug }}/{{ $subject->slug }}"
                                        class="rounded-xl px-7 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white font-semibold md:text-lg text-base shadow-md hover:scale-105 hover:shadow-xl hover:from-teal-600 hover:to-teal-800 transition-all duration-200 ease-in-out focus:ring-4 focus:ring-teal-200 outline-none border-2 border-transparent hover:border-teal-200">
                                        {{ $subject->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Question Group End -->
    @endauth

    @guest
        <div class="flex flex-col items-center justify-center min-h-[80vh] bg-gradient-to-br from-white via-teal-50 to-slate-100">
            <h1 class="text-center font-semibold text-2xl text-slate-800 mb-6">
                <a href="/register" class="text-teal-500 hover:underline hover:opacity-80 transition">Daftar sekarang</a> untuk mengakses Tryout
            </h1>
            <p class="text-slate-500">Sudah punya akun? <a href="/login" class="text-teal-500 hover:underline">Login di sini</a></p>
        </div>
    @endguest
@endsection
