@extends('layouts.app')
@section('title', 'Page Not Found — Veratech Inc.')

@section('content')
<section class="min-h-[70vh] grid place-items-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-20 w-96 h-96 bg-brand rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-sky rounded-full blur-3xl"></div>
    </div>
    <div class="relative text-center px-4">
        <div class="text-[120px] lg:text-[180px] font-black leading-none bg-gradient-to-br from-navy via-sky to-brand bg-clip-text text-transparent">
            404
        </div>
        <h1 class="mt-4 text-2xl lg:text-3xl font-black text-navy">Page Not Found</h1>
        <p class="mt-3 text-slate-600 max-w-md mx-auto">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <a href="{{ route('home') }}"
           class="mt-8 inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-brand to-brand-dark text-white font-bold shadow-lg shadow-brand/30 btn-shine">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Back to Home
        </a>
    </div>
</section>
@endsection