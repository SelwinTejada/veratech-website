@extends('layouts.app')
@section('title', 'Forbidden — Veratech Inc.')

@section('content')
<section class="min-h-[70vh] grid place-items-center">
    <div class="text-center px-4">
        <div class="text-[120px] lg:text-[180px] font-black leading-none bg-gradient-to-br from-rose-500 via-navy to-brand bg-clip-text text-transparent">
            403
        </div>
        <h1 class="mt-4 text-2xl lg:text-3xl font-black text-navy">Access Denied</h1>
        <p class="mt-3 text-slate-600 max-w-md mx-auto">
            You don't have permission to access this page.
        </p>
        <a href="{{ route('home') }}" class="mt-8 inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-navy text-white font-bold btn-shine">
            Back to Home
        </a>
    </div>
</section>
@endsection