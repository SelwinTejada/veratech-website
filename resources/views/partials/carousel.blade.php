@php
    $slides = collect();

    $slides->push((object) [
        'title'   => $info['tagline'] ?? 'Make Every Space a Meeting Place',
        'summary' => $info['line_of_business'] ?? 'Corporate and commercial reselling, wholesaling, and direct selling of hardware, software, and I.T. solutions.',
        'slug'    => 'welcome',
        'url'     => route('about'),
        'cta'     => 'Learn About Us',
        'image'   => $info['hero_image'] ?? 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80',
    ]);

    foreach ($solutions as $sol) {
        $image = $sol->image;
        if ($image && !str_starts_with($image, 'http')) {
            $image = asset('storage/'.$image);
        }

        $slides->push((object) [
            'title'   => $sol->title,
            'summary' => $sol->summary,
            'slug'    => $sol->slug,
            'url'     => route('solutions.show', $sol),
            'cta'     => 'Explore ' . $sol->title,
            'image'   => $image ?: 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
        ]);
    }

    $total = $slides->count();
@endphp

<section
    class="relative overflow-hidden animated-gradient"
    x-data="veratechCarousel({{ $total }}, 7000)"
    x-init="start()"
    @mouseenter="pause()"
    @mouseleave="resume()"
    @keydown.arrow-left.window="prev()"
    @keydown.arrow-right.window="next()"
    @touchstart.passive="onTouchStart($event)"
    @touchend.passive="onTouchEnd($event)"
    role="region"
    aria-label="Featured services"
>
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-brand/40 rounded-full blur-3xl transition-transform duration-[1500ms] ease-out"
             :style="`transform: translateX(${current * 40}px) translateY(${current * -20}px)`"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-sky/30 rounded-full blur-3xl transition-transform duration-[1500ms] ease-out"
             :style="`transform: translateX(${current * -30}px)`"></div>
    </div>

    <div class="absolute inset-0 opacity-[0.07] pointer-events-none"
         style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-8 lg:pt-28 lg:pb-12">
        <div class="relative min-h-[560px] lg:min-h-[640px]">

            @foreach ($slides as $i => $slide)
                <div
                    x-show="current === {{ $i }}"
                    x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="opacity-0 translate-y-6"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-400 absolute inset-0"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-6"
                    x-cloak
                    class="grid gap-10 lg:gap-16 lg:grid-cols-12 items-center h-full"
                >
                    <div class="lg:col-span-6">
                        <div class="flex items-center gap-4 mb-8">
                            <span class="font-mono text-xs font-bold tracking-[0.3em] text-brand">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <span class="h-px flex-1 max-w-[60px] bg-gradient-to-r from-brand to-transparent"></span>
                            <span class="font-mono text-xs font-medium tracking-[0.3em] text-white/40">
                                {{ str_pad($total, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>

                        <h2 class="text-4xl sm:text-5xl lg:text-[3.5rem] font-black text-white leading-[1.05] tracking-tight">
                            {!! nl2br(e($slide->title)) !!}
                        </h2>

                        <p class="mt-6 text-base lg:text-lg text-slate-200/85 leading-relaxed max-w-xl">
                            {{ $slide->summary }}
                        </p>

                        <div class="mt-10 flex flex-wrap gap-4">
                            <a href="{{ $slide->url }}"
                               class="btn-shine inline-flex items-center gap-2 px-7 py-4 rounded-xl bg-gradient-to-r from-brand to-brand-dark text-white font-bold shadow-2xl shadow-brand/40">
                                {{ $slide->cta }}
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            <a href="{{ route('quote') }}"
                               class="inline-flex items-center gap-2 px-7 py-4 rounded-xl border-2 border-white/25 text-white font-bold hover:bg-white/10 backdrop-blur-sm transition-all hover:border-white/40">
                                Get a Quote
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-6">
                        <div class="relative aspect-[4/3] max-w-lg mx-auto">
                            <div class="absolute -inset-4 rounded-[2.2rem] bg-gradient-to-br from-brand/40 via-transparent to-sky/40 blur-2xl opacity-60"></div>

                            <div class="relative h-full rounded-[2rem] overflow-hidden border border-white/20 shadow-2xl bg-navy-light group">
                                <img
                                    src="{{ $slide->image }}"
                                    alt="{{ $slide->title }}"
                                    class="absolute inset-0 h-full w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-105"
                                    loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                                >

                                <div class="absolute inset-0 bg-gradient-to-tr from-navy/70 via-navy/30 to-transparent"></div>

                                <div class="absolute top-5 right-5 grid grid-cols-3 gap-1 opacity-40">
                                    @for ($d = 0; $d < 9; $d++)
                                        <span class="h-1 w-1 rounded-full bg-white"></span>
                                    @endfor
                                </div>

                                <div class="absolute bottom-5 left-5 right-5 flex items-center justify-between backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl px-4 py-3">
                                    <div>
                                        <div class="text-[10px] uppercase tracking-[0.3em] text-white/70 font-bold">
                                            {{ $slide->slug === 'welcome' ? 'Veratech Inc.' : 'Featured Service' }}
                                        </div>
                                        <div class="text-sm font-bold text-white mt-0.5">
                                            {{ $slide->title }}
                                        </div>
                                    </div>
                                    <div class="h-9 w-9 rounded-full bg-brand grid place-items-center shadow-lg shadow-brand/40">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </div>
                                </div>

                                <div class="absolute top-8 left-8 h-2.5 w-2.5 rounded-full bg-brand animate-pulse"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($total > 1)
            <button @click="prev()" aria-label="Previous slide"
                    class="hidden md:grid absolute left-0 lg:-left-4 top-1/2 -translate-y-1/2 h-12 w-12 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white place-items-center transition-all duration-300 hover:scale-110 hover:border-white/40 z-10 group">
                <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <button @click="next()" aria-label="Next slide"
                    class="hidden md:grid absolute right-0 lg:-right-4 top-1/2 -translate-y-1/2 h-12 w-12 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white place-items-center transition-all duration-300 hover:scale-110 hover:border-white/40 z-10 group">
                <svg class="w-5 h-5 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        @endif
    </div>

    @if ($total > 1)
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 lg:pb-16">
            <div class="flex items-center gap-3 lg:gap-4">
                @foreach ($slides as $i => $slide)
                    <button @click="goTo({{ $i }})" aria-label="Go to slide {{ $i + 1 }}"
                            class="group relative flex-1 max-w-[140px] h-[3px] rounded-full bg-white/15 overflow-hidden transition-all hover:bg-white/25">
                        <div class="absolute inset-y-0 left-0 bg-gradient-to-r from-brand to-brand-light rounded-full transition-all ease-linear"
                             :style="current === {{ $i }}
                                ? 'width: 100%; transition-duration: {{ $i === 0 ? 0 : 7000 }}ms'
                                : 'width: 0%; transition-duration: 0ms'"></div>
                        <div x-show="current === {{ $i }}" x-cloak
                             class="absolute inset-0 bg-brand/40 blur-md rounded-full"></div>
                    </button>
                @endforeach

                <span class="ml-auto hidden sm:block font-mono text-xs text-white/50 tabular-nums">
                    <span class="text-brand font-bold" x-text="String(current + 1).padStart(2, '0')"></span>
                    <span class="mx-1">/</span>
                    <span>{{ str_pad($total, 2, '0', STR_PAD_LEFT) }}</span>
                </span>
            </div>

            <div class="mt-4 sm:hidden text-center text-[10px] uppercase tracking-[0.2em] text-white/40 font-semibold">
                Swipe to navigate
            </div>
        </div>
    @endif
</section>

<script>
    function veratechCarousel(total, duration) {
        return {
            current: 0,
            total: total,
            duration: duration,
            timer: null,
            touchStartX: 0,
            touchEndX: 0,

            start() {
                this.clearTimer();
                if (this.total > 1) {
                    this.timer = setInterval(() => this.next(), this.duration);
                }
            },
            clearTimer() { if (this.timer) clearInterval(this.timer); this.timer = null; },
            pause() { this.clearTimer(); },
            resume() { this.start(); },
            next() { this.current = (this.current + 1) % this.total; this.start(); },
            prev() { this.current = (this.current - 1 + this.total) % this.total; this.start(); },
            goTo(i) { this.current = i; this.start(); },
            onTouchStart(e) { this.touchStartX = e.changedTouches[0].screenX; },
            onTouchEnd(e) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (Math.abs(diff) > 50) {
                    if (diff > 0) this.next();
                    else this.prev();
                }
            },
        };
    }
</script>
