@extends('layouts.app')
@section('title', 'Solutions — Veratech Inc.')

@section('content')

@include('partials.page-hero', [
    'title'    => 'Solutions',
    'subtitle' => 'Enterprise-grade solutions covering every layer of the modern IT stack.',
    'badge'    => 'End-to-End Coverage',
    'image'    => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1920&q=80',
])

<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($solutions as $s)
            <a href="{{ route('solutions.show', $s) }}"
               class="tilt-card group rounded-3xl border-2 border-slate-200 bg-white p-8 shadow-sm hover:border-brand">
                <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-brand to-brand-dark grid place-items-center shadow-lg shadow-brand/30 group-hover:scale-110 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h2 class="mt-6 text-xl font-black text-navy group-hover:text-brand transition">{{ $s->title }}</h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">{{ $s->summary }}</p>
                <span class="mt-6 inline-flex items-center gap-2 text-brand text-sm font-bold group-hover:gap-3 transition-all">
                    Learn more
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
        @empty
            <p class="text-slate-500">No solutions yet.</p>
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