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

    <!-- Forgot Password Section -->
    <section class="pt-32 pb-22 bg-teal-50">
      <div class="container max-w-screen-xl mx-auto h-[100vh] flex justify-center items-center">
        <div class="flex w-3/4 rounded-3xl shadow-2xl shadow-teal-500 overflow-hidden">
          <div class="sm:w-1/2 hidden bg-teal-500 p-10 sm:flex flex-col justify-center items-center">
            <h2 class="text-3xl font-bold my-2 mb-2 text-slate-800">Reset Kata Sandi</h2>
            <p class="text-base mb-10 text-slate-800 text-center">Masukkan email Anda dan kami akan mengirimkan tautan untuk mereset kata sandi Anda.</p>
            <img src="{{ asset('img/login.svg') }}" alt="reset password" class="w-9/10" />
          </div>

          <div class="sm:w-1/2 w-full bg-white py-15 px-8">
            <h2 class="text-2xl font-bold mb-6 text-slate-900 text-center">Lupa Kata Sandi?</h2>
            <p class="text-sm text-gray-600 mb-6 text-center">Masukkan alamat email Anda untuk menerima tautan reset kata sandi.</p>

            <!-- Session Status -->
            @if (session('status'))
              <div class="text-sm text-green-600 mb-4 text-center">{{ session('status') }}</div>
            @endif

            <!-- Reset Password Form -->
            <form method="POST" action="{{ route('password.email') }}">
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

              <!-- Submit Button -->
              <div class="flex items-center justify-center w-full mt-6">
                <button type="submit" class="bg-slate-800 px-8 py-3 w-full rounded-2xl text-lg font-bold text-teal-50 hover:opacity-75">
                  Kirim Tautan Reset
                </button>
              </div>
            </form>

            <p class="text-base text-slate-900 text-center mt-6">
              <a href="{{ route('login') }}" class="text-base text-teal-500 hover:opacity-80">&larr; Kembali ke halaman login</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>feather.replace();</script>
  </body>
</html>
