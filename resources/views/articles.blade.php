@extends('layouts.app')
@section('title', 'Insights — Veratech')

@section('content')
<section class="py-16 border-b border-slate-200 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">Insights</h1>
    </div>
</section>
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($articles as $article)
            <a href="{{ route('articles.show', $article) }}" class="rounded-2xl border border-slate-200 overflow-hidden hover:shadow-md transition">
                <div class="h-40 bg-gradient-to-br from-slate-200 to-slate-300"></div>
                <div class="p-6">
                    <div class="text-xs text-slate-500">{{ $article->published_at?->format('M d, Y') }}</div>
                    <h2 class="mt-2 font-semibold">{{ $article->title }}</h2>
                    <p class="mt-2 text-sm text-slate-600">{{ $article->excerpt }}</p>
                </div>
            </a>
        @empty
            <p class="text-slate-500">No articles yet.</p>
        @endforelse
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        {{ $articles->links() }}
    </div>
</section>
@endsection