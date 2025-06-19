<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>

    @extends('layouts.main')

    <!-- Login Section -->
    <section id="login" class="pt-32 pb-22 bg-teal-50">
      <div class="container max-w-screen-xl mx-auto h-[100vh] flex justify-center items-center">
        <div class="flex w-3/4 rounded-3xl shadow-2xl shadow-teal-500 overflow-hidden">
          <div class="sm:w-1/2 hidden bg-teal-500 p-10 sm:flex flex-col justify-center items-center">
            <h2 class="text-3xl font-bold my-2 mb-2 text-slate-800">Selamat Datang Kembali</h2>
            <p class="text-base mb-10 text-slate-800 text-center">Masukkan kredensial Anda untuk mengakses akun Anda dan mulai menjelajahi dashboard</p>
            <img src="{{ asset('img/login.svg') }}" alt="login" class="w-9/10" />
          </div>
          <div class="sm:w-1/2 w-full bg-white py-15 px-8">
            <h2 class="text-2xl font-bold my-2 mb-8 text-slate-900 text-center">Masuk Ke Akun Anda</h2>

            <!-- Session Status -->
            @if (session('status'))
              <div class="text-sm text-green-600 mb-3">{{ session('status') }}</div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- Email -->
              <label for="email" class="font-medium text-md">Email</label>
              <div class="relative flex justify-center">
                <i data-feather="mail" class="absolute left-3 top-5"></i>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="w-full text-md px-2 pl-12 mt-2 mb-1 py-3 rounded-2xl border border-slate-900 focus:bg-teal-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-teal-500"
                  placeholder="contoh@gmail.com"
                  value="{{ old('email') }}"
                  required
                  autofocus
                />
              </div>
              @error('email')
                <div class="text-red-500 text-sm mt-1 mb-2">{{ $message }}</div>
              @enderror

              <!-- Password -->
              <label for="password" class="font-medium text-md">Kata Sandi</label>
              <div class="relative flex justify-center">
                <i data-feather="lock" class="absolute left-3 top-5"></i>
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="w-full text-md px-2 pl-12 mt-2 mb-1 py-3 rounded-2xl border border-slate-900 focus:bg-teal-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-teal-500"
                  required
                />
              </div>
              @error('password')
                <div class="text-red-500 text-sm mt-1 mb-2">{{ $message }}</div>
              @enderror

              <!-- Remember Me -->
              <div class="block mt-4 mb-4">
                <label class="inline-flex items-center">
                  <input type="checkbox" name="remember" class="rounded text-indigo-600">
                  <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>
              </div>

              <!-- Submit Button -->
              <div class="flex items-center justify-center w-full mt-4">
                <button type="submit" class="bg-slate-800 px-8 py-3 w-full rounded-2xl text-lg font-bold text-teal-50 hover:opacity-75">Masuk</button>
              </div>
            </form>

                @if (Route::has('password.request'))
            <div class="text-center mt-4">
                <a href="{{ route('password.request') }}" class="text-sm text-teal-500 hover:underline">
                Lupa kata sandi?
                </a>
            </div>
            @endif
            <!-- Google Login Button -->
            <div class="flex items-center justify-center w-full mt-6">
                <a href="{{ route('google.login') }}"
                class="flex items-center justify-center gap-3 w-full px-8 py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold text-lg transition duration-200">
                <svg class="w-6 h-6" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.6 20.5h-1.8v-.1H24v7.1h11.3C33.7 32 29.4 35 24 35c-6.1 0-11-4.9-11-11s4.9-11 11-11c2.8 0 5.3 1 7.2 2.8l5.3-5.3C33 7.1 28.8 5 24 5 13.5 5 5 13.5 5 24s8.5 19 19 19c10.4 0 19-8.5 19-19 0-1.2-.1-2.2-.4-3.5z"/>
                    <path fill="#FF3D00" d="M6.3 14.6l5.9 4.3C13.7 15 18.5 12 24 12c2.8 0 5.3 1 7.2 2.8l5.3-5.3C33 7.1 28.8 5 24 5c-7.4 0-13.8 4.2-17.7 10.3z"/>
                    <path fill="#4CAF50" d="M24 43c4.3 0 8.3-1.5 11.4-4l-5.3-4.4c-1.8 1.2-4.2 2-6.9 2-5.4 0-9.9-3.6-11.5-8.4l-6 4.6C9.9 38.5 16.5 43 24 43z"/>
                    <path fill="#1976D2" d="M43.6 20.5h-1.8v-.1H24v7.1h11.3c-1.1 3.1-3.1 5.5-5.6 7.2l.1.1 6 4.6c-.4.3 6.5-4.8 6.5-13.3 0-1.2-.1-2.2-.4-3.5z"/>
                </svg>
                Login dengan Google
                </a>
            </div>

            <p class="text-base text-slate-900 text-center mt-3">
              Belum punya akun?
              <a href="{{ route('register') }}" class="text-base text-teal-500 hover:opacity-80">Daftar Sekarang</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>feather.replace();</script>
  </body>
</html>
