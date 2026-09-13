@extends('layouts.app')
@section('title', 'Server Error — Veratech Inc.')

@section('content')
<section class="min-h-[70vh] grid place-items-center">
    <div class="text-center px-4">
        <div class="text-[120px] lg:text-[180px] font-black leading-none bg-gradient-to-br from-rose-500 via-brand to-navy bg-clip-text text-transparent">
            500
        </div>
        <h1 class="mt-4 text-2xl lg:text-3xl font-black text-navy">Something Went Wrong</h1>
        <p class="mt-3 text-slate-600 max-w-md mx-auto">
            Our team has been notified. Please try again in a few moments.
        </p>
        <a href="{{ route('home') }}" class="mt-8 inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-navy text-white font-bold btn-shine">
            Back to Home
        </a>
    </div>
</section>
@endsection