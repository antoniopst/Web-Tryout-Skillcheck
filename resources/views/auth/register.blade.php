<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Skillcheck</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    @extends('layouts.main')

  <!-- Register Section Start -->
  <section class="pt-32 pb-22 bg-slate-50 min-h-screen flex items-center">
    <div class="container max-w-screen-xl mx-auto flex justify-center items-center">
      <div class="flex w-3/4 rounded-3xl shadow-2xl shadow-slate-800 overflow-hidden">
        <div class="sm:w-1/2 hidden sm:flex bg-slate-800 p-10 flex-col items-center">
          <h2 class="text-3xl font-bold mb-2 text-teal-500">Daftar Sekarang</h2>
          <p class="text-base mb-10 text-teal-500 text-center">Buat akun baru Anda dan mulai menjelajahi semua fitur hebat kami.</p>
          <img src="{{ asset('img/register.svg') }}" alt="Register Image" class="w-9/10">
        </div>
        <div class="sm:w-1/2 w-full bg-white py-10 px-8">
          <h2 class="text-2xl font-bold mb-8 text-slate-900 text-center">Buat Akun Baru</h2>
          <form action="{{ route('register') }}" method="POST">
            @csrf

            {{-- Name --}}
            <label for="name" class="font-medium text-md">Nama Lengkap</label>
            <div class="relative">
              <i data-feather="user" class="absolute left-3 top-5"></i>
              <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full pl-12 mt-2 mb-1 py-3 rounded-2xl border border-slate-900 focus:ring-2 focus:ring-slate-800 focus:outline-none"
                placeholder="Nama lengkap Anda" required>
            </div>
            @error('name')
              <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Email --}}
            <label for="email" class="font-medium text-md mt-4 block">Email</label>
            <div class="relative">
              <i data-feather="mail" class="absolute left-3 top-5"></i>
              <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full pl-12 mt-2 mb-1 py-3 rounded-2xl border border-slate-900 focus:ring-2 focus:ring-slate-800 focus:outline-none"
                placeholder="contoh@gmail.com" required>
            </div>
            @error('email')
              <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- School --}}
            <label for="school" class="font-medium text-md mt-4 block">Asal Sekolah</label>
            <div class="relative">
            <i data-feather="home" class="absolute left-3 top-5"></i>
            <input type="text" name="school" id="school" value="{{ old('school') }}"
                class="w-full pl-12 mt-2 mb-1 py-3 rounded-2xl border border-slate-900 focus:ring-2 focus:ring-slate-800 focus:outline-none"
                placeholder="Nama sekolah asal Anda" required>
            </div>
            @error('school')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Password --}}
            <label for="password" class="font-medium text-md mt-4 block">Kata Sandi</label>
            <div class="relative">
              <i data-feather="lock" class="absolute left-3 top-5"></i>
              <input type="password" name="password" id="password"
                class="w-full pl-12 mt-2 mb-1 py-3 rounded-2xl border border-slate-900 focus:ring-2 focus:ring-slate-800 focus:outline-none"
                placeholder="" required>
            </div>
            @error('password')
              <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            {{-- Confirm Password --}}
            <label for="password_confirmation" class="font-medium text-md mt-4 block">Konfirmasi Kata Sandi</label>
            <div class="relative">
              <i data-feather="lock" class="absolute left-3 top-5"></i>
              <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full pl-12 mt-2 mb-1 py-3 rounded-2xl border border-slate-900 focus:ring-2 focus:ring-slate-800 focus:outline-none"
                placeholder="" required>
            </div>
            @error('password_confirmation')
              <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <div class="mt-6">
              <button type="submit"
                class="bg-slate-800 px-8 py-3 w-full rounded-2xl text-lg font-bold text-white hover:opacity-80">
                Daftar
              </button>
            </div>

            <!-- Google Register/Login Button -->
            <div class="flex items-center justify-center w-full mt-4">
                <a href="{{ route('google.login') }}"
                class="flex items-center justify-center gap-3 w-full px-8 py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold text-lg transition duration-200">
                <svg class="w-6 h-6" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.6 20.5h-1.8v-.1H24v7.1h11.3C33.7 32 29.4 35 24 35c-6.1 0-11-4.9-11-11s4.9-11 11-11c2.8 0 5.3 1 7.2 2.8l5.3-5.3C33 7.1 28.8 5 24 5 13.5 5 5 13.5 5 24s8.5 19 19 19c10.4 0 19-8.5 19-19 0-1.2-.1-2.2-.4-3.5z"/>
                    <path fill="#FF3D00" d="M6.3 14.6l5.9 4.3C13.7 15 18.5 12 24 12c2.8 0 5.3 1 7.2 2.8l5.3-5.3C33 7.1 28.8 5 24 5c-7.4 0-13.8 4.2-17.7 10.3z"/>
                    <path fill="#4CAF50" d="M24 43c4.3 0 8.3-1.5 11.4-4l-5.3-4.4c-1.8 1.2-4.2 2-6.9 2-5.4 0-9.9-3.6-11.5-8.4l-6 4.6C9.9 38.5 16.5 43 24 43z"/>
                    <path fill="#1976D2" d="M43.6 20.5h-1.8v-.1H24v7.1h11.3c-1.1 3.1-3.1 5.5-5.6 7.2l.1.1 6 4.6c-.4.3 6.5-4.8 6.5-13.3 0-1.2-.1-2.2-.4-3.5z"/>
                </svg>
                Daftar dengan Google
                </a>
            </div>
          </form>
          <p class="text-base text-slate-900 text-center mt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-teal-500 hover:underline">Masuk di sini</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Register Section End -->

  <script src="{{ asset('js/script.js') }}"></script>
  <script>feather.replace();</script>
</body>
</html>
