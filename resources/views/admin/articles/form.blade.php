@extends('layouts.admin')
@section('page_title', $article->exists ? 'Edit article' : 'New article')

@section('content')
<form method="POST" action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-4">
    @csrf @if ($article->exists) @method('PUT') @endif
    <div><label class="block text-sm font-medium">Title</label>
        <input type="text" name="title" value="{{ old('title', $article->title) }}" required class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $article->slug) }}" class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">Excerpt</label>
        <textarea name="excerpt" rows="2" class="mt-1 w-full rounded-md border-slate-300">{{ old('excerpt', $article->excerpt) }}</textarea></div>
    <div><label class="block text-sm font-medium">Body</label>
        <textarea name="body" rows="12" class="mt-1 w-full rounded-md border-slate-300">{{ old('body', $article->body) }}</textarea></div>
    <div><label class="block text-sm font-medium">Image</label>
        <input type="file" name="image_file" accept="image/*" class="mt-1 w-full"></div>
    <div><label class="block text-sm font-medium">Publish date</label>
        <input type="datetime-local" name="published_at" value="{{ old('published_at', $article->published_at?->format('Y-m-d\TH:i')) }}" class="mt-1 w-64 rounded-md border-slate-300"></div>
    <label class="inline-flex items-center gap-2 text-sm">
        <input type="hidden" name="is_published" value="0">
        <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $article->is_published ?? false))> Published
    </label>
    <div class="flex gap-2">
        <button class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Save</button>
        <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 rounded-md border border-slate-300 text-sm">Cancel</a>
    </div>
</form>
@endsection