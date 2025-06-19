@extends('layouts.main')

@section('container')
<section class="pt-36 pb-20 min-h-screen bg-gradient-to-br from-white via-teal-50 to-slate-100">
  <div class="container max-w-3xl mx-auto px-4">
    <div class="flex items-center gap-4 mb-8">
      <div class="bg-teal-500 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg text-3xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
        </svg>
      </div>
      <div>
        <h1 class="text-2xl md:text-4xl font-bold text-teal-600 mb-1">
          Selamat Datang, {{ Auth::user()->name }}
        </h1>
        <p class="text-slate-600">Berikut adalah riwayat tryout kamu:</p>
      </div>
    </div>

    @if($histories->isEmpty())
      <div class="bg-white/80 border border-teal-100 rounded-xl p-8 text-center shadow">
        <p class="text-slate-600 text-lg">Belum ada riwayat tryout.</p>
        <a href="{{ route('question.lists') }}"
           class="mt-6 inline-block px-6 py-2 bg-teal-500 text-white rounded-lg font-semibold shadow hover:bg-teal-600 transition">
          Mulai Tryout Pertama
        </a>
      </div>
    @else
      <div class="overflow-x-auto bg-white/80 border border-teal-100 rounded-xl shadow-lg">
        <table class="min-w-full text-sm text-slate-700 rounded-xl overflow-hidden">
          <thead class="bg-gradient-to-r from-teal-500 to-teal-400 text-white">
            <tr>
              <th class="px-4 py-3 text-left font-semibold">Tanggal</th>
              <th class="px-4 py-3 text-left font-semibold">Tryout</th>
              <th class="px-4 py-3 text-left font-semibold">Skor</th>
            </tr>
          </thead>
          <tbody>
            @foreach($histories as $history)
              <tr class="border-b hover:bg-teal-50 transition">
                <td class="px-4 py-3">{{ $history->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3">{{ $history->title ?? '-' }}</td>
                <td class="px-4 py-3">
                  <span class="inline-block px-3 py-1 rounded-full font-bold
                    {{ ($history->score ?? 0) >= 80 ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $history->score ?? '-' }}
                  </span>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</section>
@endsection
