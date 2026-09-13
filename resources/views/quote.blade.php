@extends('layouts.app')
@section('title', 'Request a Quote — Veratech Inc.')

@section('content')

<section class="relative overflow-hidden animated-gradient py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-20 w-72 h-72 bg-brand rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-sky rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand bg-white/10 backdrop-blur border border-white/20 rounded-full px-4 py-2">
            Fast Response · Tailored Solutions
        </span>
        <h1 class="mt-6 text-4xl lg:text-5xl font-black text-white tracking-tight">Request a Quote</h1>
        <p class="mt-4 text-lg text-slate-200 max-w-2xl mx-auto">
            Tell us about your project and our specialists will prepare a tailored proposal.
        </p>
    </div>
</section>

<section class="py-20 -mt-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-white border-2 border-slate-200 shadow-2xl p-8 lg:p-12">
            <form method="POST" action="{{ route('quote.store') }}" class="space-y-5">
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
                        <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder=" ">
                        <label for="company">Company name</label>
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-2">
                    <div class="float-input">
                        <select id="product_interest" name="product_interest">
                            <option value="" selected disabled></option>
                            @foreach ($solutions as $s)
                                <option value="{{ $s->title }}" @selected(old('product_interest') === $s->title)>{{ $s->title }}</option>
                            @endforeach
                            @foreach ($brands as $b)
                                <option value="Brand: {{ $b->name }}" @selected(old('product_interest') === 'Brand: '.$b->name)>Brand: {{ $b->name }}</option>
                            @endforeach
                        </select>
                        <label for="product_interest">Product interest</label>
                    </div>
                    <div class="float-input">
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder=" ">
                        <label for="subject">Subject</label>
                    </div>
                </div>

                <div class="float-input">
                    <textarea id="message" name="message" rows="6" placeholder=" " required>{{ old('message') }}</textarea>
                    <label for="message">Your requirements *</label>
                </div>

                <button type="submit"
                        class="btn-shine w-full inline-flex items-center justify-center gap-2 px-7 py-4 rounded-xl bg-gradient-to-r from-brand to-brand-dark text-white font-bold shadow-lg shadow-brand/30">
                    Submit Request
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection