@props([
    "title",
    "subtitle" => null,
    "badge"    => null,
    "image",
])

<section class="relative overflow-hidden">
    <img src="{{ $image }}"
         alt=""
         class="absolute inset-0 h-full w-full object-cover"
         loading="eager">

    <div class="absolute inset-0 bg-gradient-to-br from-navy/95 via-navy/85 to-navy/70"></div>

    <div class="absolute inset-0 opacity-[0.08] pointer-events-none"
         style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="absolute -top-20 -right-20 w-96 h-96 bg-brand/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 text-center fade-up">
        @if ($badge)
            <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand bg-white/10 backdrop-blur border border-white/20 rounded-full px-4 py-2">
                {{ $badge }}
            </span>
        @endif

        <h1 class="mt-6 text-4xl lg:text-5xl font-black text-white tracking-tight">
            {{ $title }}
        </h1>

        @if ($subtitle)
            <p class="mt-4 text-lg text-slate-200 max-w-2xl mx-auto">
                {{ $subtitle }}
            </p>
        @endif
    </div>
</section>
