@extends('layouts.app')

@section('title', 'Dashboard Proyek')

@section('content')
    @if(session('success'))
      <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative overflow-hidden" role="alert" id="success-alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <button class="absolute top-0 right-0 px-4 py-3 text-red-500 hover:text-red-700 cursor-pointer" onclick="this.parentElement.style.display='none'">&times;</button>
      </div>
    @endif

    <section class="max-w-4xl mx-auto px-6 py-24">
      @include('partials.confirm')

      <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold text-stone-900">Dashboard</h2>
        <div class="flex gap-2">
          <a href="{{ route('projects.create') }}" class="nav-link-btn bg-stone-900 text-white px-5 py-2.5 rounded-md text-sm font-medium hover:bg-stone-700 transition-colors">Tambah Proyek</a>
          <a href="{{ route('projects.index') }}"
           class="nav-link-btn border border-stone-300 text-stone-600 px-5 py-2.5 rounded-md text-sm font-medium hover:bg-stone-100 transition-colors">
          ← Kembali ke Proyek
          </a>
        </div>
      </div>
      @include('partials.page', ['options' => $options, 'perPage' => $perPage])

      {{-- Published --}}
      <div class="mb-12">
        <h3 class="text-md font-semibold uppercase tracking-wide mb-4">Sudah Dipublish</h3>
        @if($published->isEmpty())
          <p class="text-stone-400 text-sm">Tidak ada proyek yang dipublish.</p>
        @else
          {{-- Container Grid untuk daftar proyek --}}
          <div class="grid sm:grid-cols-2 gap-6">
            @foreach ($published as $project)
              <div class="border border-stone-200 rounded-lg p-5 bg-white">
                <div class="flex items-center gap-2 mb-1">
                  <h4 class="font-semibold text-stone-900">{{ $project->title }}</h4>
                  <span class="text-xs bg-green-50 text-green-600 px-2 py-0.5 rounded-full">Published</span>
                </div>
                <p class="text-sm text-stone-600 mb-3">{{ $project->description }}</p>
                <div class="flex flex-wrap gap-2 mb-4">
                  @foreach (explode(',', $project->tech) as $tech)
                    <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">{{ trim($tech) }}</span>
                  @endforeach
                </div>
                <div class="flex gap-2 pt-3 border-t border-stone-100">
                  <form action="{{ route('projects.unpublish', $project->id) }}" method="POST" data-confirm-modal data-confirm-title="Unpublish Proyek" data-confirm-message="Apakah anda yakin ingin mengunpublish proyek {{ $project->title }}?">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="text-sm text-amber-600 border border-amber-200 px-3 py-1.5 rounded-md hover:bg-amber-50 transition-colors">
                      Unpublish
                    </button>
                  </form>
                </div>
              </div>
            @endforeach
          </div> {{-- End Grid --}}

          {{-- Pagination ditaruh di luar Grid --}}
          
          <div class="mt-6">
            {{ $published->onEachSide(1)->withQueryString()->links('pagination::tailwind') }}
          </div>
        @endif
      </div>

      <!-- DRAFT (belum dipublish) -->
      <div class="mb-12">
        <h3 class="text-md font-semibold uppercase tracking-wide mb-4">Belum Dipublish</h3>

        @if($drafts->isEmpty())
          <p class="text-stone-400 text-sm">Tidak ada draft.</p>
        @else
          <div class="grid sm:grid-cols-2 gap-6">
            @foreach ($drafts as $project)
              <div class="border border-stone-200 rounded-lg p-5 bg-white">
                <div class="flex items-center gap-2 mb-1">
                  <h4 class="font-semibold text-stone-900">{{ $project->title }}</h4>
                  <span class="text-xs bg-amber-50 text-amber-600 px-2 py-0.5 rounded-full">Draft</span>
                </div>
                <p class="text-sm text-stone-600 mb-3">{{ $project->description }}</p>
                <div class="flex flex-wrap gap-2 mb-4">
                  @foreach (explode(',', $project->tech) as $tech)
                    <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">{{ trim($tech) }}</span>
                  @endforeach
                </div>
                <div class="flex gap-2 pt-3 border-t border-stone-100">
                  <form action="{{ route('projects.publish', $project->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                            class="text-sm text-green-600 border border-green-200 px-3 py-1.5 rounded-md hover:bg-green-50 transition-colors">
                      Publish
                    </button>
                  </form>
                  <a href="{{ route('projects.edit', $project->id) }}"
                     class="text-sm text-stone-600 border border-stone-300 px-3 py-1.5 rounded-md hover:bg-stone-100 transition-colors">
                    Edit
                  </a>
                  <form action="{{ route('projects.destroy', $project->id) }}" method="POST" data-confirm-modal data-confirm-title="Hapus Proyek" data-confirm-message="Apakah anda yakin ingin menghapus proyek {{ $project->title }}?">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-sm text-red-600 border border-red-200 px-3 py-1.5 rounded-md hover:bg-red-50 transition-colors">
                      Delete
                    </button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>

          <div class="mt-6">
            {{ $drafts->onEachSide(1)->withQueryString()->links('pagination::tailwind') }}
          </div>
        @endif
      </div>

      <!-- SUDAH DIHAPUS (soft deleted) -->
      <div>
        <h3 class="text-md font-semibold uppercase tracking-wide mb-4">Sudah Dihapus</h3>

        @if($trashed->isEmpty())
          <p class="text-stone-400 text-sm">Tidak ada proyek yang dihapus.</p>
        @else
          <div class="grid sm:grid-cols-2 gap-6">
            @foreach ($trashed as $project)
              <div class="border border-stone-200 rounded-lg p-5 bg-stone-50 opacity-80">
                <div class="flex items-center gap-2 mb-1">
                  <h4 class="font-semibold text-stone-500 line-through">{{ $project->title }}</h4>
                  <span class="text-xs bg-red-50 text-red-500 px-2 py-0.5 rounded-full">Dihapus</span>
                </div>
                <p class="text-sm text-stone-500 mb-3">{{ $project->description }}</p>
                <div class="flex flex-wrap gap-2 mb-4">
                  @foreach (explode(',', $project->tech) as $tech)
                    <span class="text-xs bg-stone-200 text-stone-500 px-2 py-1 rounded">{{ trim($tech) }}</span>
                  @endforeach
                </div>
                <div class="flex gap-2 pt-3 border-t border-stone-200">
                  <form action="{{ route('projects.restore', $project->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="text-sm text-stone-700 border border-stone-300 px-3 py-1.5 rounded-md hover:bg-stone-100 transition-colors inline-flex items-center gap-1.5">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12a9 9 0 1 0 3-6.7M3 4v5h5"/>
                      </svg>
                      Restore
                    </button>
                  </form>

                  <form action="{{ route('projects.forceDelete', $project->id) }}" method="POST" data-confirm-modal data-confirm-title="Hapus Proyek Permanen" data-confirm-message="Apakah anda yakin ingin menghapus proyek {{ $project->title }} secara permanen?">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-sm text-red-600 border border-red-200 px-3 py-1.5 rounded-md hover:bg-red-50 transition-colors">
                      Delete Permanent
                    </button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
          <div class="mt-6">
            {{ $trashed->onEachSide(1)->withQueryString()->links('pagination::tailwind') }}
          </div>
        @endif
      </div>

    </section>
@endsection

@push('scripts')
<script>
    // modal delete
    const modal = document.getElementById('confirm-modal');
    const modalOverlay = document.getElementById('confirm-overlay');
    const closeBtn = document.getElementById('confirm-cancel');
    const deleteBtn = document.getElementById('confirm-delete');
    const modalTitle = document.getElementById('modal-title');
    const modalMessage = document.getElementById('modal-message');
    let formData = null;

    function openModal(formDataValue){
        if(!modal) return;
        formData = formDataValue;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modalTitle.textContent = formDataValue.dataset.confirmTitle || 'Konfirmasi';
        modalMessage.textContent = formDataValue.dataset.confirmMessage || 'Apakah anda yakin ingin melanjutkan?';
        
    }

    function closeModal(){
        if(!modal) return;
        formData = null;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modalTitle.textContent = 'Konfirmasi';
        modalMessage.textContent = 'Apakah anda yakin ingin melanjutkan?';
    }

    document.querySelectorAll('[data-confirm-modal]').forEach(form => {
      form.addEventListener('submit', (e) => {
            e.preventDefault();
            openModal(form);
        });
    });

    closeBtn.addEventListener('click', closeModal);
    modalOverlay.addEventListener('click', closeModal);

    deleteBtn.addEventListener('click', () => {
        if(formData){
            formData.submit();
        }else{
            closeModal();
        }
    });
</script>
@endpush
