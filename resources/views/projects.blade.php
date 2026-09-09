@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <!-- PROJECTS -->
    <section id="projects" class="page max-w-4xl mx-auto px-6 py-24">
      <h2 class="text-3xl font-bold text-stone-900 mb-8">Proyek</h2>
      <div class="grid sm:grid-cols-2 gap-6">
 
        <div class="border border-stone-200 rounded-lg p-5 bg-white">
          <h3 class="font-semibold text-stone-900 mb-1">Website Toko Online</h3>
          <p class="text-sm text-stone-600 mb-3">Aplikasi e-commerce sederhana dengan fitur keranjang belanja dan katalog produk.</p>
          <div class="flex flex-wrap gap-2">
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">HTML</span>
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">Tailwind</span>
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">JavaScript</span>
          </div>
        </div>
 
        <div class="border border-stone-200 rounded-lg p-5 bg-white">
          <h3 class="font-semibold text-stone-900 mb-1">Aplikasi To-Do List</h3>
          <p class="text-sm text-stone-600 mb-3">Aplikasi pencatat tugas harian dengan fitur tambah, edit, dan hapus tugas.</p>
          <div class="flex flex-wrap gap-2">
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">JavaScript</span>
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">CSS</span>
          </div>
        </div>
 
        <div class="border border-stone-200 rounded-lg p-5 bg-white">
          <h3 class="font-semibold text-stone-900 mb-1">Portfolio Pribadi</h3>
          <p class="text-sm text-stone-600 mb-3">Website portofolio ini sendiri, dibangun menggunakan Tailwind CSS.</p>
          <div class="flex flex-wrap gap-2">
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">HTML</span>
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">Tailwind</span>
          </div>
        </div>
 
        <div class="border border-stone-200 rounded-lg p-5 bg-white">
          <h3 class="font-semibold text-stone-900 mb-1">Sistem Absensi Sederhana</h3>
          <p class="text-sm text-stone-600 mb-3">Proyek kampus untuk mencatat kehadiran mahasiswa berbasis web.</p>
          <div class="flex flex-wrap gap-2">
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">PHP</span>
            <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">MySQL</span>
          </div>
        </div>
 
      </div>
    </section>
@endsection

@section('scripts')