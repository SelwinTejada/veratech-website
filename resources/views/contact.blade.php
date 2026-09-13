@extends('layouts.app')
@section('title', 'Contact Us — Veratech Inc.')

@php $info = \App\Models\CompanyInfo::pluck('value','key'); @endphp

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden animated-gradient py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-20 w-72 h-72 bg-brand rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-sky rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand bg-white/10 backdrop-blur border border-white/20 rounded-full px-4 py-2">
            We'd Love to Hear From You
        </span>
        <h1 class="mt-6 text-4xl lg:text-5xl font-black text-white tracking-tight">Contact Us</h1>
        <p class="mt-4 text-lg text-slate-200 max-w-2xl mx-auto">
            Have a question or need support? Send us a message and our team will get back to you.
        </p>
    </div>
</section>

<section class="py-20 -mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-8 lg:grid-cols-5">

        {{-- Contact info --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Address --}}
            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-xl">
                <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-brand to-brand-dark grid place-items-center shadow-lg shadow-brand/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="mt-5 text-lg font-black text-navy">Visit Us</h3>
                <p class="mt-2 text-slate-600 text-sm leading-relaxed">
                    {{ $info['address'] ?? '148 Milagros, San Juan City, 1500 Metro Manila' }}
                </p>
            </div>

            {{-- Phone --}}
            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-xl">
                <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-sky to-sky-dark grid place-items-center shadow-lg shadow-sky/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <h3 class="mt-5 text-lg font-black text-navy">Call Us</h3>
                <a href="tel:{{ $info['phone'] ?? '' }}" class="mt-2 text-slate-600 text-sm hover:text-brand transition">
                    {{ $info['phone'] ?? '8398-9486' }}
                </a>
            </div>

            {{-- Email --}}
            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-xl">
                <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-navy to-navy-dark grid place-items-center shadow-lg shadow-navy/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="mt-5 text-lg font-black text-navy">Email Us</h3>
                <a href="mailto:{{ $info['email'] ?? 'sales@veratechph.com' }}" class="mt-2 text-slate-600 text-sm hover:text-brand transition break-all">
                    {{ $info['email'] ?? 'sales@veratechph.com' }}
                </a>
            </div>

            {{-- Map --}}
            <div class="rounded-3xl overflow-hidden border-2 border-slate-200 shadow-xl">
                <iframe
                    src="https://www.google.com/maps?q=148+Milagros+San+Juan+City+Metro+Manila&output=embed"
                    width="100%" height="260" style="border:0" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        {{-- Form --}}
        <div class="lg:col-span-3">
            <div class="rounded-3xl bg-white border-2 border-slate-200 shadow-xl p-8 lg:p-10">
                <h2 class="text-2xl font-black text-navy">Send Us a Message</h2>
                <p class="mt-2 text-slate-600 text-sm">Fill out the form and we'll reply within 24 hours.</p>

                <form method="POST" action="{{ route('contact.store') }}" class="mt-8 space-y-5">
                    @csrf

                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="float-input">
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder=" " required>
                            <label for="name">Full name *</label>
                        </div>
                        <div class="float-input">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder=" " required>
                            <label for="email">Email address *</label>
                        </div>
                        <div class="float-input">
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder=" ">
                            <label for="phone">Phone number</label>
                        </div>
                        <div class="float-input">
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder=" ">
                            <label for="subject">Subject</label>
                        </div>
                    </div>

                    <div class="float-input">
                        <textarea id="message" name="message" rows="5" placeholder=" " required>{{ old('message') }}</textarea>
                        <label for="message">Message *</label>
                    </div>

                    <button type="submit"
                            class="btn-shine w-full inline-flex items-center justify-center gap-2 px-7 py-4 rounded-xl bg-gradient-to-r from-brand to-brand-dark text-white font-bold shadow-lg shadow-brand/30">
                        Send Message
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection