<header class="border-b border-stone-200 bg-stone-50/90 backdrop-blur sticky top-0 z-20">
    <div class="max-w-4xl mx-auto px-6 py-4 flex items-center justify-between">
      <span class="text-lg font-semibold tracking-tight">Unknown.</span>
      <nav class="flex gap-6 text-sm text-stone-500">
        <a href="{{ route('home') }}" class="nav-link pb-1 hover:text-stone-900 transition-colors {{ Route::is('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('about') }}" class="nav-link pb-1 hover:text-stone-900 transition-colors {{ Route::is('about') ? 'active' : '' }}">About</a>
        <a href="{{ route('education') }}" class="nav-link pb-1 hover:text-stone-900 transition-colors {{ Route::is('education') ? 'active' : '' }}">Education</a>
        <a href="{{ route('projects') }}" class="nav-link pb-1 hover:text-stone-900 transition-colors {{ Route::is('projects') ? 'active' : '' }}">Projects</a>
      </nav>
    </div>
  </header>