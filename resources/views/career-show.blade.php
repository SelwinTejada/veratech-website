@extends('layouts.app')
@section('title', $career->title . ' — Careers — Veratech Inc.')

@section('content')

<section class="relative overflow-hidden animated-gradient py-16">
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 fade-up">
        <a href="{{ route('careers') }}" class="inline-flex items-center gap-2 text-brand text-sm font-bold hover:gap-3 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
            All positions
        </a>
        <h1 class="mt-4 text-3xl lg:text-4xl font-black text-white tracking-tight">{{ $career->title }}</h1>
        <div class="mt-4 flex flex-wrap gap-2">
            @if ($career->department)
                <span class="text-xs font-bold uppercase tracking-wider text-brand bg-white/10 backdrop-blur border border-white/20 rounded-full px-3 py-1">{{ $career->department }}</span>
            @endif
            @if ($career->location)
                <span class="text-xs font-bold uppercase tracking-wider text-white/90 bg-white/10 backdrop-blur border border-white/20 rounded-full px-3 py-1">{{ $career->location }}</span>
            @endif
            <span class="text-xs font-bold uppercase tracking-wider text-white/90 bg-white/10 backdrop-blur border border-white/20 rounded-full px-3 py-1">{{ $career->type }}</span>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        {{-- Job description --}}
        <div class="rounded-3xl bg-white border-2 border-slate-200 shadow-xl p-8 lg:p-10">
            <h2 class="text-xl font-black text-navy">Description</h2>
            <div class="mt-4 text-slate-600 leading-relaxed whitespace-pre-line">{{ $career->description }}</div>

            @if ($career->requirements)
                <h2 class="mt-10 text-xl font-black text-navy">Requirements</h2>
                <div class="mt-4 text-slate-600 leading-relaxed whitespace-pre-line">{{ $career->requirements }}</div>
            @endif
        </div>

        {{-- Application form --}}
        <div class="rounded-3xl bg-white border-2 border-slate-200 shadow-xl p-8 lg:p-10">
            <h2 class="text-2xl font-black text-navy">Apply for this position</h2>
            <p class="mt-2 text-slate-600 text-sm">All fields marked with * are required.</p>

            <form method="POST" action="{{ route('careers.apply', $career) }}" enctype="multipart/form-data" class="mt-8 space-y-5">
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
                </div>

                <div class="float-input">
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder=" ">
                    <label for="phone">Phone number</label>
                </div>

                <div>
                    <label class="block text-sm font-bold text-navy mb-2">Resume (PDF, DOC, DOCX — max 8MB) *</label>
                    <input type="file" name="resume" required accept=".pdf,.doc,.docx"
                           class="w-full text-sm file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:bg-brand file:text-white file:font-bold hover:file:bg-brand-dark cursor-pointer border-2 border-slate-200 rounded-xl p-2">
                </div>

                <div class="float-input">
                    <textarea id="cover_letter" name="cover_letter" rows="6" placeholder=" ">{{ old('cover_letter') }}</textarea>
                    <label for="cover_letter">Cover letter</label>
                </div>

                <button type="submit"
                        class="btn-shine w-full inline-flex items-center justify-center gap-2 px-7 py-4 rounded-xl bg-gradient-to-r from-brand to-brand-dark text-white font-bold shadow-lg shadow-brand/30">
                    Submit Application
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection