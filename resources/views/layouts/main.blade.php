<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Tailwind --}}
    @vite('resources/css/app.css')
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Skill Check</title>
  </head>
  <body class="min-h-screen flex flex-col">
    {{-- Header --}}
    @include('partials.header')

    {{-- Konten --}}
    <main class="flex-1 w-full">
        @yield('container')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    <!-- Javascript -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>
  </body>
</html>
