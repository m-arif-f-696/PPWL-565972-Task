<!-- MODAL CONFIRM DELETE -->
<div id="confirm-modal" class="fixed inset-0 z-50 hidden items-center justify-center">
  <!-- Overlay -->
  <div id="confirm-overlay" class="absolute inset-0 bg-stone-900/40"></div>

  <!-- Modal box -->
  <div class="relative bg-white rounded-lg shadow-lg w-full max-w-sm mx-4 p-6 ">
    <div class="flex items-start gap-3 mb-4">
      <div class="shrink-0 w-10 h-10 rounded-full bg-red-50 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5 text-red-600">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/>
        </svg>
      </div>
      <div>
        <h3 class="font-semibold text-stone-900" id="modal-title">Hapus proyek?</h3>
        <p class="text-sm text-stone-500 mt-1" id="modal-message">Tindakan ini tidak bisa dibatalkan. Proyek akan dihapus secara permanen.</p>
      </div>
    </div>

    <div class="flex justify-end gap-2 mt-6">
      <button
        type="button"
        id="confirm-cancel"
        class="text-sm text-stone-600 border border-stone-300 px-4 py-2 rounded-md hover:bg-stone-100 transition-colors"
      >
        Batal
      </button>
      <button
        type="button"
        id="confirm-delete"
        class="text-sm text-white bg-red-600 px-4 py-2 rounded-md hover:bg-red-700 transition-colors"
      >
        Ya
      </button>
    </div>
  </div>
</div>