@extends('layouts.app')
@section('title', 'Veratech Inc. — I.T. Solutions Provider')

@section('content')

{{-- ═══ HERO ═══ --}}
<section class="relative overflow-hidden animated-gradient">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-brand rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-20 w-96 h-96 bg-sky rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 grid gap-12 lg:grid-cols-2 items-center">
        <div class="fade-up">
            <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-brand bg-white/10 backdrop-blur border border-white/20 rounded-full px-4 py-2">
                <span class="h-2 w-2 rounded-full bg-brand animate-pulse"></span>
                Trusted I.T. Partner in the Philippines
            </span>

            <h1 class="mt-6 text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.1] tracking-tight">
                {{ $info['tagline'] ?? 'Make Every Space a Meeting Place' }}
            </h1>

            <p class="mt-6 text-lg text-slate-200 leading-relaxed max-w-xl">
                {{ $info['line_of_business'] ?? 'Corporate and commercial reselling, wholesaling, and direct selling of hardware, software, and I.T. solutions that fit your needs.' }}
            </p>

            <div class="mt-10 flex flex-wrap gap-4">
                <a href="{{ route('quote') }}"
                   class="btn-shine inline-flex items-center gap-2 px-7 py-4 rounded-xl bg-gradient-to-r from-brand to-brand-dark text-white font-bold shadow-2xl shadow-brand/30">
                    Request a Quote
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('brands') }}"
                   class="inline-flex items-center gap-2 px-7 py-4 rounded-xl border-2 border-white/30 text-white font-bold hover:bg-white/10 backdrop-blur transition">
                    View Our Brands
                </a>
            </div>

            {{-- Stats --}}
            <div class="mt-12 grid grid-cols-3 gap-6 pt-8 border-t border-white/10">
                <div>
                    <div class="text-3xl font-black text-brand">100+</div>
                    <div class="text-xs uppercase tracking-wider text-slate-300 mt-1">Global Brands</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-brand">15+</div>
                    <div class="text-xs uppercase tracking-wider text-slate-300 mt-1">Years Experience</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-brand">24/7</div>
                    <div class="text-xs uppercase tracking-wider text-slate-300 mt-1">Support</div>
                </div>
            </div>
        </div>

        {{-- Hero visual --}}
        <div class="relative fade-up fade-up-delay-1">
            <div class="aspect-square rounded-3xl bg-gradient-to-br from-sky/30 via-brand/20 to-navy/60 backdrop-blur-xl border border-white/20 shadow-2xl grid place-items-center p-8">
                <div class="text-center">
                    <div class="inline-flex h-24 w-24 rounded-2xl bg-gradient-to-br from-brand to-brand-dark items-center justify-center mb-6 shadow-2xl shadow-brand/40">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="text-white font-bold text-xl">Enterprise Grade</div>
                    <div class="text-slate-200 text-sm mt-2">Hardware · Software · Solutions</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Wave divider --}}
    <div class="relative -mb-px">
        <svg viewBox="0 0 1440 100" class="w-full h-auto text-slate-50" preserveAspectRatio="none"><path fill="currentColor" d="M0,50 C300,100 600,0 900,50 C1200,100 1440,50 1440,50 L1440,100 L0,100 Z"/></svg>
    </div>
</section>

{{-- ═══ WHO WE ARE ═══ --}}
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-16 lg:grid-cols-2 items-center">

        <div class="relative">
            <div class="aspect-square rounded-3xl bg-gradient-to-br from-sky-100 via-white to-brand/10 border border-slate-200 shadow-xl grid place-items-center p-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-brand/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-sky/20 rounded-full blur-3xl"></div>
                <svg class="w-40 h-40 text-navy relative" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
        </div>

        <div>
            <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand">About Us</span>
            <h2 class="mt-4 text-4xl font-black text-navy tracking-tight">WHO WE ARE</h2>
            <div class="mt-6 text-slate-600 leading-relaxed space-y-4">
                <p>{{ $info['commitment'] ?? 'Veratech Inc. is a company founded by entrepreneurs who are well-experienced in the retail and corporate I.T. industry. We have partnered with the top I.T. brands and suppliers in the Philippines to ensure that we offer the best to our clients.' }}</p>
            </div>
            <a href="{{ route('about') }}" class="mt-8 inline-flex items-center gap-2 text-brand font-bold hover:gap-3 transition-all">
                Learn more about us
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ═══ WHAT WE OFFER ═══ --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand">Our Solutions</span>
            <h2 class="mt-4 text-4xl font-black text-navy tracking-tight">WHAT WE OFFER</h2>
            <p class="mt-4 text-slate-600">Complete I.T. solutions covering every layer of your business.</p>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-3">

            {{-- Hardware --}}
            <div class="tilt-card group rounded-3xl border-2 border-slate-100 bg-white p-8 shadow-sm hover:border-brand">
                <div class="h-20 w-20 rounded-2xl bg-gradient-to-br from-brand to-brand-dark grid place-items-center shadow-lg shadow-brand/30 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="mt-6 text-2xl font-black text-navy">HARDWARE</h3>
                <ul class="mt-6 space-y-3 text-sm text-slate-600">
                    @foreach (['PC Laptops','PC Desktops','Servers','Tablets','Mobile Phones','Printers','Consumables','LCD/LED Monitors','Projectors','Others'] as $item)
                        <li class="flex items-center gap-3">
                            <span class="h-5 w-5 rounded-full bg-brand/10 grid place-items-center shrink-0">
                                <svg class="w-3 h-3 text-brand" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Software --}}
            <div class="tilt-card group rounded-3xl border-2 border-slate-100 bg-white p-8 shadow-sm hover:border-sky">
                <div class="h-20 w-20 rounded-2xl bg-gradient-to-br from-sky to-sky-dark grid place-items-center shadow-lg shadow-sky/30 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h3 class="mt-6 text-2xl font-black text-navy">SOFTWARE</h3>
                <ul class="mt-6 space-y-3 text-sm text-slate-600">
                    @foreach (['Operating Systems','Productivity','Security','Database Management','Others'] as $item)
                        <li class="flex items-center gap-3">
                            <span class="h-5 w-5 rounded-full bg-sky/10 grid place-items-center shrink-0">
                                <svg class="w-3 h-3 text-sky" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Business Essentials --}}
            <div class="tilt-card group rounded-3xl border-2 border-slate-100 bg-white p-8 shadow-sm hover:border-navy">
                <div class="h-20 w-20 rounded-2xl bg-gradient-to-br from-navy to-navy-dark grid place-items-center shadow-lg shadow-navy/30 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="mt-6 text-2xl font-black text-navy">BUSINESS ESSENTIALS</h3>
                <ul class="mt-6 space-y-3 text-sm text-slate-600">
                    @foreach (['Networking Products','Storage Solutions','Power Management','CCTV','Structured Cabling','POS Terminals','Barcode Scanners','Large Format Displays','Touch Panels','Mounting Solutions','Others'] as $item)
                        <li class="flex items-center gap-3">
                            <span class="h-5 w-5 rounded-full bg-navy/10 grid place-items-center shrink-0">
                                <svg class="w-3 h-3 text-navy" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ═══ TRUSTED BRANDS ═══ --}}
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand">Our Partners</span>
            <h2 class="mt-4 text-4xl font-black text-navy tracking-tight">Trusted Brands We Represent</h2>
            <p class="mt-4 text-slate-600">Authorized reseller and integrator for the world's leading technology brands.</p>
        </div>

        <div class="mt-14 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach ($brands as $brand)
                @php $logoUrl = method_exists($brand, 'logoUrl') ? $brand->logoUrl() : null; @endphp
                <div class="logo-cell flex items-center justify-center h-24 rounded-2xl border-2 border-slate-200 bg-white p-4">
                    @if ($logoUrl)
                        <img src="{{ $logoUrl }}" alt="{{ $brand->name }}"
                             class="max-h-14 max-w-full object-contain"
                             loading="lazy"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <span class="hidden text-slate-700 font-bold text-center text-sm">{{ $brand->name }}</span>
                    @else
                        <span class="text-slate-700 font-bold text-center text-sm">{{ $brand->name }}</span>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('brands') }}"
               class="btn-shine inline-flex items-center gap-2 px-7 py-3.5 rounded-xl bg-navy text-white font-bold shadow-lg shadow-navy/20">
                View All Brands
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ═══ CTA ═══ --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden animated-gradient p-12 lg:p-16 text-center">
            <div class="absolute top-0 left-0 w-64 h-64 bg-brand/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-sky/20 rounded-full blur-3xl"></div>

            <div class="relative">
                <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tight">Ready to modernize your infrastructure?</h2>
                <p class="mt-4 text-lg text-slate-200 max-w-2xl mx-auto">
                    Talk to a Veratech specialist today. We'll help you design the right solution for your business.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a href="{{ route('quote') }}"
                       class="btn-shine inline-flex items-center gap-2 px-7 py-4 rounded-xl bg-gradient-to-r from-brand to-brand-dark text-white font-bold shadow-2xl shadow-brand/30">
                        Request a Quote
                    </a>
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-2 px-7 py-4 rounded-xl border-2 border-white/30 text-white font-bold hover:bg-white/10 backdrop-blur transition">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection