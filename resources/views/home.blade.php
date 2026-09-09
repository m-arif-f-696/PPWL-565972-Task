@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section id="home" class="page max-w-4xl mx-auto px-6 py-24">
      <p class="text-stone-500 mb-3">Halo, perkenalkan saya</p>
      <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-stone-900 mb-4">Unknown</h1>
      <p class="text-lg text-stone-600 max-w-xl mb-8">
        Mahasiswa Informatika yang senang membangun aplikasi web dan belajar hal baru di dunia teknologi.
      </p>
      <div class="flex gap-4">
        <a href="{{ route('projects') }}" class="nav-link-btn bg-stone-900 text-white px-5 py-2.5 rounded-md text-sm font-medium hover:bg-stone-700 transition-colors">
          Lihat Proyek
        </a>
        <a href="{{ route('about') }}" class="nav-link-btn border border-stone-300 px-5 py-2.5 rounded-md text-sm font-medium hover:bg-stone-100 transition-colors">
          Tentang Saya
        </a>
      </div>
    </section>
@endsection

@section('scripts')