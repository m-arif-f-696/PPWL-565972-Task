@extends('layouts.app')

@section('title', 'Education')

@section('content')
    <!-- EDUCATION -->
    <section id="education" class="page max-w-4xl mx-auto px-6 py-24">
      <h2 class="text-3xl font-bold text-stone-900 mb-8">Pendidikan</h2>
      <div class="space-y-8">
 
        <div class="border-l-2 border-stone-300 pl-5">
          <p class="text-sm text-stone-400">2022 — Sekarang</p>
          <h3 class="text-lg font-semibold text-stone-900">S1 Teknik Informatika</h3>
          <p class="text-stone-600">Universitas Contoh, Yogyakarta</p>
          <p class="text-stone-500 text-sm mt-1">IPK 3.60 / 4.00</p>
        </div>
 
        <div class="border-l-2 border-stone-300 pl-5">
          <p class="text-sm text-stone-400">2019 — 2022</p>
          <h3 class="text-lg font-semibold text-stone-900">SMA Contoh</h3>
          <p class="text-stone-600">Jurusan MIPA</p>
        </div>
 
        <div class="border-l-2 border-stone-300 pl-5">
          <p class="text-sm text-stone-400">2016 — 2019</p>
          <h3 class="text-lg font-semibold text-stone-900">SMP Contoh</h3>
        </div>
      </div>
    </section>
@endsection

@section('scripts')