@extends('layouts.app')
@section('title', 'Careers — Veratech Inc.')

@section('content')

@include('partials.page-hero', [
    'title'    => 'Careers',
    'subtitle' => 'Build a career with a team of passionate I.T. professionals.',
    'badge'    => 'Join Our Team',
    'image'    => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=80',
])

<section class="py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        @forelse ($careers as $career)
            <div class="tilt-card group grid gap-0 md:grid-cols-5 rounded-3xl border-2 border-slate-200 bg-white overflow-hidden shadow-sm hover:border-brand">
                {{-- Image --}}
                <div class="md:col-span-2 relative h-64 md:h-auto overflow-hidden bg-gradient-to-br from-navy via-navy-light to-sky">
                    <div class="absolute inset-0 opacity-30">
                        <div class="absolute top-10 left-10 w-40 h-40 bg-brand rounded-full blur-3xl"></div>
                        <div class="absolute bottom-10 right-10 w-40 h-40 bg-sky rounded-full blur-3xl"></div>
                    </div>
                    <div class="relative h-full grid place-items-center p-8">
                        <svg class="w-24 h-24 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                </div>

                {{-- Content --}}
                <div class="md:col-span-3 p-8 lg:p-10">
                    <div class="flex flex-wrap gap-2 mb-4">
                        @if ($career->department)
                            <span class="text-xs font-bold uppercase tracking-wider text-brand bg-brand/10 rounded-full px-3 py-1">{{ $career->department }}</span>
                        @endif
                        @if ($career->location)
                            <span class="text-xs font-bold uppercase tracking-wider text-sky bg-sky/10 rounded-full px-3 py-1">{{ $career->location }}</span>
                        @endif
                        <span class="text-xs font-bold uppercase tracking-wider text-navy bg-navy/10 rounded-full px-3 py-1">{{ $career->type }}</span>
                    </div>

                    <h2 class="text-2xl font-black text-navy">{{ $career->title }}</h2>
                    <div class="mt-4 text-slate-600 text-sm whitespace-pre-line leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($career->description, 220) }}
                    </div>

                    <a href="{{ route('careers.show', $career) }}"
                       class="mt-6 inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-navy text-white font-bold text-sm hover:bg-navy-light transition">
                        View &amp; Apply
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center py-24 rounded-3xl border-2 border-dashed border-slate-300 bg-white">
                <svg class="w-16 h-16 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <div class="mt-4 text-lg font-bold text-navy">No open positions right now</div>
                <p class="mt-2 text-slate-500 text-sm">Check back soon or send your resume to <a href="mailto:hr@veratechph.com" class="text-brand font-semibold">hr@veratechph.com</a>.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection