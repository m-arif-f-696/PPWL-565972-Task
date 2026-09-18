@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <!-- PROJECTS -->
    <section id="projects" class="page max-w-4xl mx-auto px-6 py-24">
      <div class="flex justify-between">
        <div>
          <h2 class="text-3xl font-bold text-stone-900 mb-8">Proyek</h2>
        </div>
        <div>
          <a href="{{ route('projects.create') }}" class="nav-link-btn bg-stone-900 text-white px-5 py-2.5 rounded-md text-sm font-medium hover:bg-stone-700 transition-colors">Tambah Proyek</a>
        </div>
      </div>
      <div class="grid sm:grid-cols-2 gap-6">

        @if($projects->isEmpty())
          <p class="text-stone-500">Belum ada proyek.</p>
        @else
        @foreach ($projects as $project)
        <div class="border border-stone-200 rounded-lg p-5 bg-white">
          <h3 class="font-semibold text-stone-900 mb-1">{{ $project->title }}</h3>
          <p class="text-sm text-stone-600 mb-3">{{ $project->description }}</p>
          <div class="flex flex-wrap gap-2">
            @foreach (explode(',', $project->tech) as $tech)
              <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">{{ $tech }}</span>
            @endforeach
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </section>


@endsection

@section('scripts')