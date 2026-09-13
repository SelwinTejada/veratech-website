@php $info = \App\Models\CompanyInfo::pluck('value','key'); @endphp

<footer class="relative mt-24 bg-navy text-slate-300 overflow-hidden">
    {{-- Decorative gradient blob --}}
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-brand/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-sky/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid gap-10 md:grid-cols-2 lg:grid-cols-4">

        {{-- Brand column --}}
<div class="flex items-center gap-3">
    <span class="inline-flex h-12 w-12 rounded-xl bg-white overflow-hidden items-center justify-center shadow-lg shadow-black/20">
        <img src="{{ asset('images/veratech-logo.jpg') }}"
             alt="Veratech"
             class="h-full w-full object-contain p-0.5">
    </span>
    <div class="leading-tight">
        <div class="text-lg font-extrabold text-white">Veratech</div>
        <div class="text-[10px] uppercase tracking-widest text-brand font-semibold">I.T. Solutions</div>
    </div>
</div>
            <p class="mt-5 text-sm text-slate-400 leading-relaxed">
                {{ $info['tagline'] ?? 'Make Every Space a Meeting Place' }}
            </p>

            <div class="mt-6 flex gap-3">
                @if (!empty($info['facebook']))
                    <a href="{{ $info['facebook'] }}" target="_blank" rel="noopener"
                       class="h-10 w-10 rounded-lg bg-white/5 hover:bg-brand flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                @endif
                @if (!empty($info['linkedin']))
                    <a href="{{ $info['linkedin'] }}" target="_blank" rel="noopener"
                       class="h-10 w-10 rounded-lg bg-white/5 hover:bg-sky flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.063 2.063 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                @endif
                @if (!empty($info['twitter']))
                    <a href="{{ $info['twitter'] }}" target="_blank" rel="noopener"
                       class="h-10 w-10 rounded-lg bg-white/5 hover:bg-sky-400 flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                @endif
            </div>
        </div>

        {{-- Company links --}}
        <div>
            <h3 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Company</h3>
            <ul class="space-y-3 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-brand transition-colors">Home</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-brand transition-colors">About Us</a></li>
                <li><a href="{{ route('brands') }}" class="hover:text-brand transition-colors">Brands</a></li>
                <li><a href="{{ route('careers') }}" class="hover:text-brand transition-colors">Careers</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-brand transition-colors">Contact Us</a></li>
            </ul>
        </div>

        {{-- Solutions --}}
        <div>
            <h3 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Solutions</h3>
            <ul class="space-y-3 text-sm">
                <li><a href="{{ route('solutions') }}" class="hover:text-brand transition-colors">Hardware</a></li>
                <li><a href="{{ route('solutions') }}" class="hover:text-brand transition-colors">Software</a></li>
                <li><a href="{{ route('solutions') }}" class="hover:text-brand transition-colors">Business Essentials</a></li>
                <li><a href="{{ route('industries') }}" class="hover:text-brand transition-colors">Industries</a></li>
                <li><a href="{{ route('articles') }}" class="hover:text-brand transition-colors">Insights</a></li>
            </ul>
        </div>

        {{-- Contact --}}
        <div>
            <h3 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Get in Touch</h3>
            <ul class="space-y-4 text-sm">
                <li class="flex gap-3">
                    <svg class="w-5 h-5 text-brand shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span class="text-slate-400">{{ $info['address'] ?? '148 Milagros, San Juan City, 1500 Metro Manila' }}</span>
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 text-brand shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <a href="tel:{{ $info['phone'] ?? '' }}" class="text-slate-400 hover:text-brand transition-colors">{{ $info['phone'] ?? '8398-9486' }}</a>
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 text-brand shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <a href="mailto:{{ $info['email'] ?? '' }}" class="text-slate-400 hover:text-brand transition-colors break-all">{{ $info['email'] ?? 'sales@veratechph.com' }}</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="relative border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-slate-500">
            <div>© {{ date('Y') }} {{ $info['company_name'] ?? 'Veratech Inc.' }}. All rights reserved.</div>
            <div>Built with ♥ in the Philippines</div>
        </div>
    </div>
</footer>