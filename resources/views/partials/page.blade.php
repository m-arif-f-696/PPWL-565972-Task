<form method="GET" action="{{ url()->current() }}" class="flex items-center justify-end gap-2 mb-8">
    <label for="per_page" class="text-sm text-stone-500">Tampilkan</label>

    <select
        name="per_page"
        id="per_page"
        onchange="this.form.submit()"
        class="text-sm text-stone-700 bg-white border border-stone-300 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-stone-400 focus:border-stone-400 cursor-pointer"
    >
        @foreach ($options as $size)
        <option value="{{ $size }}" @selected($perPage === $size)>{{ $size }}</option>
        @endforeach
    </select>

    <span class="text-sm text-stone-500">proyek per halaman</span>

    <noscript>
        <button type="submit" class="text-sm border border-stone-300 px-3 py-1.5 rounded-md">Terapkan</button>
    </noscript>
</form>