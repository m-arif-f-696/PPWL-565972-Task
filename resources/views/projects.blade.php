@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <!-- PROJECTS -->
    @if(session('success'))
      <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative overflow-hidden" role="alert" id="success-alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <button class="absolute top-0 right-0 px-4 py-3 text-red-500 hover:text-red-700 cursor-pointer" onclick="this.parentElement.style.display='none'">&times;</button>
        
        <!-- Progress Bar Memanjang -->
        <div class="absolute bottom-0 left-0 h-1 bg-green-500 w-0 progress-bar-grow"></div>
      </div>
    @endif
    <section id="projects" class="page max-w-4xl mx-auto px-6 py-24">
      @include('partials.confirm')
      <div class="flex justify-between">
        <div>
          <h2 class="text-3xl font-bold text-stone-900 mb-8">Proyek</h2>
        </div>
        <div>
          <a href="{{ route('projects.dashboard') }}" class="nav-link-btn border border-stone-300 text-stone-600 px-5 py-2.5 rounded-md text-sm font-medium hover:bg-stone-100 transition-colors">Dashboard</a>
        </div>
      </div>
      
      @if($projects->isEmpty())
      <p class="text-stone-500">Belum ada proyek.</p>
      @else
      <div class="grid sm:grid-cols-2 gap-6">
        @foreach ($projects as $project)
        <div class="border border-stone-200 rounded-lg p-5 bg-white">
          <h3 class="font-semibold text-stone-900 mb-1">{{ $project->title }}</h3>
          <p class="text-sm text-stone-600 mb-3">{{ $project->description }}</p>
          <div class="flex flex-wrap gap-2 mb-4">
            @foreach (explode(',', $project->tech) as $tech)
              <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">{{ trim($tech) }}</span>
            @endforeach
          </div>
        </div>
        @endforeach

      </div>
      <!-- Pagination -->
      <div class='flex justify-between mt-8'>
        @include('partials.page', ['options' => $options, 'perPage' => $perPage])
        {{ $projects->onEachSide(0)->withQueryString()->links('pagination::tailwind') }}
      </div>
        @endif
    </section>


@endsection

@push('scripts')
<script>
    // Hide success alert after 5 seconds
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.display = 'none';
        }, 5000);
    }
</script>

@endpush
