@props(['brand'])

@php
    $url = $brand->logoUrl();
@endphp

@if ($url)
    <img
        src="{{ $url }}"
        alt="{{ $brand->name }}"
        class="max-h-16 max-w-full object-contain"
        loading="lazy"
        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
    <span class="hidden text-slate-700 font-semibold text-center text-sm">
        {{ $brand->name }}
    </span>
@else
    <span class="text-slate-700 font-semibold text-center text-sm">
        {{ $brand->name }}
    </span>
@endif