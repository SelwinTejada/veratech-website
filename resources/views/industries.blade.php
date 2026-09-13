@extends('layouts.app')
@section('title', 'Industries — Veratech Inc.')

@section('content')

<section class="relative overflow-hidden animated-gradient py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-20 w-72 h-72 bg-brand rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-sky rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand bg-white/10 backdrop-blur border border-white/20 rounded-full px-4 py-2">
            Tailored to Your Sector
        </span>
        <h1 class="mt-6 text-4xl lg:text-5xl font-black text-white tracking-tight">Industries We Serve</h1>
        <p class="mt-4 text-lg text-slate-200 max-w-2xl mx-auto">
            Industry-tuned technology that solves real business problems.
        </p>
    </div>
</section>

<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($industries as $industry)
            <a href="{{ route('industries.show', $industry) }}"
               class="tilt-card group rounded-3xl border-2 border-slate-200 bg-white p-8 shadow-sm hover:border-sky">
                <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-sky to-sky-dark grid place-items-center shadow-lg shadow-sky/30 group-hover:scale-110 transition">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h2 class="mt-6 text-lg font-black text-navy group-hover:text-sky transition">{{ $industry->title }}</h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">{{ $industry->summary }}</p>
            </a>
        @empty
            <p class="text-slate-500">No industries yet.</p>
        @endforelse
    </div>
</section>

@isset($current)
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-black text-navy">{{ $current->title }}</h2>
        <div class="mt-6 text-slate-600 leading-relaxed whitespace-pre-line">{{ $current->body }}</div>
    </div>
</section>
@endisset
@endsection