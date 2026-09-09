@extends('layouts.app')

@section('title', 'About Me')

@section('content')
    <section id="about" class="page max-w-4xl mx-auto px-6 py-24">
      <h2 class="text-3xl font-bold text-stone-900 mb-6">Tentang Saya</h2>
      <div class="space-y-4 text-stone-600 max-w-2xl leading-relaxed">
        <p>
          Nama saya Unknown, seorang mahasiswa yang tertarik dengan pengembangan web,
          khususnya di sisi front-end. Saya senang mengeksplorasi teknologi baru dan
          menerapkannya dalam proyek-proyek kecil untuk terus belajar.
        </p>
        <p>
          Selain coding, saya juga tertarik dengan desain antarmuka yang sederhana dan
          mudah digunakan. Saya percaya bahwa tampilan yang bersih membantu pengguna
          memahami sebuah produk dengan lebih cepat.
        </p>
      </div>
 
      <div class="mt-10">
        <h3 class="text-sm font-semibold text-stone-900 mb-3">Skill</h3>
        <div class="flex flex-wrap gap-2">
          <span class="text-sm bg-stone-200 text-stone-700 px-3 py-1 rounded-full">HTML</span>
          <span class="text-sm bg-stone-200 text-stone-700 px-3 py-1 rounded-full">CSS</span>
          <span class="text-sm bg-stone-200 text-stone-700 px-3 py-1 rounded-full">JavaScript</span>
          <span class="text-sm bg-stone-200 text-stone-700 px-3 py-1 rounded-full">Tailwind CSS</span>
          <span class="text-sm bg-stone-200 text-stone-700 px-3 py-1 rounded-full">Git</span>
        </div>
      </div>
    </section>
@endsection

@section('scripts')