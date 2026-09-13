@php
    $info = \App\Models\CompanyInfo::pluck('value','key');
    $nav = [
        ['label' => 'Home',        'route' => 'home'],
        ['label' => 'About Us',    'route' => 'about'],
        ['label' => 'Solutions',   'route' => 'solutions'],
        ['label' => 'Brands',      'route' => 'brands'],
        ['label' => 'Careers',     'route' => 'careers'],
        ['label' => 'Insights',    'route' => 'articles'],
        ['label' => 'Contact Us',  'route' => 'contact'],
    ];
@endphp

<header x-data="{ open: false, scrolled: false }"
        @scroll.window="scrolled = window.scrollY > 20"
        :class="scrolled ? 'bg-white/90 backdrop-blur-lg shadow-lg shadow-slate-900/5' : 'bg-white'"
        class="sticky top-0 z-50 border-b border-slate-200/60 transition-all duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">

        {{-- Logo --}}
<a href="{{ route('home') }}" class="flex items-center gap-3 group">
    <span class="inline-flex h-12 w-12 rounded-xl bg-white border border-slate-200 shadow-sm overflow-hidden items-center justify-center group-hover:shadow-md group-hover:scale-105 transition-all">
        <img src="{{ asset('images/veratech-logo.jpg') }}"
             alt="Veratech"
             class="h-full w-full object-contain p-0.5">
    </span>
    <div class="leading-tight">
        <div class="text-lg font-extrabold text-navy tracking-tight">Veratech</div>
        <div class="text-[10px] uppercase tracking-widest text-slate-500 font-semibold">I.T. Solutions</div>
    </div>
</a>

        {{-- Desktop nav --}}
        <nav class="hidden lg:flex items-center gap-1">
            @foreach ($nav as $item)
                <a href="{{ route($item['route']) }}"
                   class="relative px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200
                          {{ request()->routeIs($item['route'].'*') ? 'text-brand' : 'text-slate-700 hover:text-navy' }}">
                    {{ $item['label'] }}
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-brand rounded-full transition-all duration-300
                                 {{ request()->routeIs($item['route'].'*') ? 'w-6' : 'w-0' }}"></span>
                </a>
            @endforeach
        </nav>

        {{-- CTA button --}}
        <div class="hidden lg:flex items-center gap-3">
            <a href="{{ route('quote') }}"
               class="btn-shine inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand to-brand-dark text-white text-sm font-bold shadow-lg shadow-brand/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Get a Quote
            </a>
        </div>

        {{-- Mobile menu toggle --}}
        <button @click="open = !open" class="lg:hidden p-2 rounded-lg text-navy hover:bg-slate-100 transition" aria-label="Toggle menu">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden border-t border-slate-200 bg-white">
        <nav class="px-4 py-4 space-y-1">
            @foreach ($nav as $item)
                <a href="{{ route($item['route']) }}"
                   class="block px-4 py-3 rounded-lg text-sm font-semibold transition
                          {{ request()->routeIs($item['route'].'*') ? 'bg-brand/10 text-brand' : 'text-slate-700 hover:bg-slate-100' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
            <a href="{{ route('quote') }}"
               class="block mt-2 text-center px-4 py-3 rounded-lg bg-gradient-to-r from-brand to-brand-dark text-white text-sm font-bold">
                Get a Quote
            </a>
        </nav>
    </div>
</header>