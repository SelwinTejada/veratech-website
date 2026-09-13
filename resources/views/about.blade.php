@extends('layouts.app')
@section('title', 'About Us — Veratech Inc.')

@section('content')

<section class="relative overflow-hidden animated-gradient py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-20 w-72 h-72 bg-brand rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-sky rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand bg-white/10 backdrop-blur border border-white/20 rounded-full px-4 py-2">
            Trusted I.T. Partner
        </span>
        <h1 class="mt-6 text-4xl lg:text-5xl font-black text-white tracking-tight">About Veratech</h1>
        <p class="mt-4 text-lg text-slate-200 max-w-3xl mx-auto">
            Veratech Inc. is a full-service enterprise technology integrator, delivering reliable, secure and future-ready I.T. to every client we serve.
        </p>
    </div>
</section>

<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-12 lg:grid-cols-2">
        <div class="rounded-3xl border-2 border-slate-200 bg-white p-10 shadow-xl">
            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-brand to-brand-dark grid place-items-center shadow-lg shadow-brand/30">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <h2 class="mt-6 text-2xl font-black text-navy">Our Mission</h2>
            <p class="mt-4 text-slate-600 leading-relaxed">{{ $info['commitment'] ?? '' }}</p>
        </div>

        <div class="rounded-3xl border-2 border-slate-200 bg-white p-10 shadow-xl">
            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-sky to-sky-dark grid place-items-center shadow-lg shadow-sky/30">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h2 class="mt-6 text-2xl font-black text-navy">What We Do</h2>
            <p class="mt-4 text-slate-600 leading-relaxed">{{ $info['line_of_business'] ?? '' }}</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 grid gap-6 md:grid-cols-3">
        <div class="rounded-3xl border-2 border-slate-200 bg-white p-8 shadow-sm">
            <div class="h-12 w-12 rounded-2xl bg-brand/10 grid place-items-center">
                <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
            </div>
            <h3 class="mt-5 font-black text-navy">Proven Delivery</h3>
            <p class="mt-2 text-sm text-slate-600">Hundreds of successful enterprise deployments across the region.</p>
        </div>
        <div class="rounded-3xl border-2 border-slate-200 bg-white p-8 shadow-sm">
            <div class="h-12 w-12 rounded-2xl bg-sky/10 grid place-items-center">
                <svg class="w-6 h-6 text-sky" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-5.13a4 4 0 11-8 0 4 4 0 018 0zm6 0a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3 class="mt-5 font-black text-navy">Certified Engineers</h3>
            <p class="mt-2 text-sm text-slate-600">Vendor-certified team across networking, security and cloud.</p>
        </div>
        <div class="rounded-3xl border-2 border-slate-200 bg-white p-8 shadow-sm">
            <div class="h-12 w-12 rounded-2xl bg-navy/10 grid place-items-center">
                <svg class="w-6 h-6 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h3 class="mt-5 font-black text-navy">24/7 Support</h3>
            <p class="mt-2 text-sm text-slate-600">Round-the-clock NOC and helpdesk backed by strict SLAs.</p>
        </div>
    </div>
</section>
@endsection