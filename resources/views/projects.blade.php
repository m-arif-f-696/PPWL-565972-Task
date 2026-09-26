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
          <div class="flex flex-wrap gap-2 mb-4">
            @foreach (explode(',', $project->tech) as $tech)
              <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded">{{ trim($tech) }}</span>
            @endforeach
          </div>

          <div class="flex gap-2 pt-3 border-t border-stone-100">
            
            <a  href="{{ route('projects.edit', $project->id) }}"
              class="text-sm text-stone-600 border border-stone-300 px-3 py-1.5 rounded-md hover:bg-stone-100 transition-colors"
            >
              Edit
            </a>

            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                  data-confirm-modal>
              @csrf
              @method('DELETE')
              <button
                type="submit"
                class="text-sm text-red-600 border border-red-200 px-3 py-1.5 rounded-md hover:bg-red-50 transition-colors"
              >
                Delete
              </button>
            </form>
          </div>
        </div>
        @endforeach
        @endif
      </div>
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

    // modal delete
    const modal = document.getElementById('confirm-modal');
    const modalOverlay = document.getElementById('confirm-overlay');
    const closeBtn = document.getElementById('confirm-cancel');
    const deleteBtn = document.getElementById('confirm-delete');
    let formData = null;

    function openModal(formDataValue){
        if(!modal) return;
        formData = formDataValue;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
    }

    function closeModal(){
        if(!modal) return;
        formData = null;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.querySelectorAll('[data-confirm-modal]').forEach(form => {
        // console.log(form);  
      form.addEventListener('submit', (e) => {
          // console.log(form);
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
