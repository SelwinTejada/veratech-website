@extends('layouts.app')
@section('title', $article->title.' — Veratech')
@section('description', $article->excerpt)

@section('content')
<section class="py-16">
    <div class="max-w-3xl mx-auto px-4">
        <div class="text-xs text-slate-500">{{ $article->published_at->format('F j, Y') }}</div>
        <h1 class="mt-2 text-4xl font-bold">{{ $article->title }}</h1>
        <p class="mt-4 text-lg text-slate-600">{{ $article->excerpt }}</p>
        <div class="prose prose-slate mt-8">{!! nl2br(e($article->body)) !!}</div>
    </div>
</section>
@endsection