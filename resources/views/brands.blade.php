@extends('layouts.app')
@section('title', 'Brands — Veratech Inc.')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden animated-gradient py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-20 w-72 h-72 bg-brand rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-sky rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <span class="inline-block text-xs font-bold tracking-widest uppercase text-brand bg-white/10 backdrop-blur border border-white/20 rounded-full px-4 py-2">
            Authorized Reseller &amp; Integrator
        </span>
        <h1 class="mt-6 text-4xl lg:text-5xl font-black text-white tracking-tight">Our Brands</h1>
        <p class="mt-4 text-lg text-slate-200 max-w-2xl mx-auto">
            We represent the top I.T. brands and suppliers in the Philippines across every category.
        </p>
    </div>
</section>

{{-- Brand grids --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        @foreach ($brands as $category => $items)
            <div>
                <div class="text-center">
                    <h2 class="inline-block text-2xl lg:text-3xl font-black text-navy tracking-tight relative">
                        {{ $category }}
                        <span class="block h-1 w-16 bg-brand rounded-full mx-auto mt-3"></span>
                    </h2>
                </div>

                <div class="mt-12 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach ($items as $brand)
                        @php $logoUrl = method_exists($brand, 'logoUrl') ? $brand->logoUrl() : null; @endphp
                        <div class="logo-cell flex items-center justify-center h-28 rounded-2xl border-2 border-slate-200 bg-white p-4">
                            @if ($logoUrl)
                                <img src="{{ $logoUrl }}" alt="{{ $brand->name }}"
                                     class="max-h-16 max-w-full object-contain"
                                     loading="lazy"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                <span class="hidden text-slate-700 font-bold text-center text-sm">{{ $brand->name }}</span>
                            @else
                                <span class="text-slate-700 font-bold text-center text-sm">{{ $brand->name }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

@isset($current)
<section class="py-16 bg-slate-50 border-t border-slate-200">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-black text-navy">{{ $current->name }}</h2>
        <p class="mt-4 text-slate-600">{{ $current->description }}</p>
        @if ($current->products->count())
            <h3 class="mt-8 text-xl font-bold text-navy">Products</h3>
            <ul class="mt-3 list-disc ml-5 text-slate-700 space-y-1">
                @foreach ($current->products as $product)
                    <li>{{ $product->name }} — {{ $product->summary }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
@endisset
@endsection