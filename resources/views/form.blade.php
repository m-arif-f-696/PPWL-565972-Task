@extends('layouts.app')

@section('title', 'Projects Form')

@section('content')
    <!-- PROJECTS -->
    <!-- ADD PROJECT FORM -->
<section id="add-project" class="page max-w-4xl mx-auto px-6 py-24">
  <h2 class="text-3xl font-bold text-stone-900 mb-2">Tambah Proyek</h2>
  <p class="text-stone-500 mb-8">Isi detail proyek yang ingin ditambahkan ke halaman Projects.</p>

  <form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST" class="max-w-xl space-y-6">
    @csrf
    @if(isset($project))
      @method('PUT')
    @endif
    <div>
      <label for="project-title" class="block text-sm font-medium text-stone-700 mb-1.5">Judul Proyek</label>
      <input
        type="text"
        name="title"
        id="project-title"
        value="{{ old('title', isset($project) ? $project->title : '') }}"
        placeholder="Contoh: Website Toko Online"
        class="w-full border border-stone-300 rounded-md px-3.5 py-2.5 text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-400 focus:border-stone-400"
        required
      />
      @error('title')
      <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="project-desc" class="block text-sm font-medium text-stone-700 mb-1.5">Deskripsi</label>
      <textarea
        id="project-desc"
        rows="4"
        name="description"
        placeholder="Jelaskan singkat tentang proyek ini..."
        class="w-full border border-stone-300 rounded-md px-3.5 py-2.5 text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-400 focus:border-stone-400"
        required
      >{{ old('description', isset($project) ? $project->description : '') }}</textarea>
      @error('description')
      <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="project-tech" class="block text-sm font-medium text-stone-700 mb-1.5">Teknologi</label>
      <input
        type="text"
        name="tech"
        id="project-tech"
        value="{{ old('tech', isset($project) ? $project->tech : '') }}"
        placeholder="Pisahkan dengan koma, contoh: HTML, Tailwind, JavaScript"
        class="w-full border border-stone-300 rounded-md px-3.5 py-2.5 text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-400 focus:border-stone-400"
      />
    </div>

    <div>
      <label for="project-link" class="block text-sm font-medium text-stone-700 mb-1.5">Link Proyek (opsional)</label>
      <input
        type="url"
        id="project-link"
        name="link"
        value="{{ old('link', isset($project) ? $project->link : '') }}"
        placeholder="https://..."
        class="w-full border border-stone-300 rounded-md px-3.5 py-2.5 text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-400 focus:border-stone-400"
      />
    </div>

    <div class="flex gap-3 pt-2">
      <button
        type="submit"
        class="bg-stone-900 text-white px-5 py-2.5 rounded-md text-sm font-medium hover:bg-stone-700 transition-colors"
      >
        Simpan Proyek
      </button>
      <a href="{{ route('projects.index') }}"
        class="nav-link-btn border border-stone-300 px-5 py-2.5 rounded-md text-sm font-medium hover:bg-stone-100 transition-colors"
      >
        Batal
      </a>
    </div>

  </form>
</section>
    
@endsection

@section('scripts')