@extends('layouts.admin')
@section('page_title', $solution->exists ? 'Edit solution' : 'New solution')

@section('content')
<form method="POST" action="{{ $solution->exists ? route('admin.solutions.update', $solution) : route('admin.solutions.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-4">
    @csrf @if ($solution->exists) @method('PUT') @endif
    <div><label class="block text-sm font-medium">Title</label>
        <input type="text" name="title" value="{{ old('title', $solution->title) }}" required class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $solution->slug) }}" class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">Summary</label>
        <textarea name="summary" rows="2" class="mt-1 w-full rounded-md border-slate-300">{{ old('summary', $solution->summary) }}</textarea></div>
    <div><label class="block text-sm font-medium">Body</label>
        <textarea name="body" rows="8" class="mt-1 w-full rounded-md border-slate-300">{{ old('body', $solution->body) }}</textarea></div>
    <div><label class="block text-sm font-medium">Icon (name)</label>
        <input type="text" name="icon" value="{{ old('icon', $solution->icon) }}" class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">Image</label>
        <input type="file" name="image_file" accept="image/*" class="mt-1 w-full"></div>
    <div><label class="block text-sm font-medium">Sort order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $solution->sort_order ?? 0) }}" class="mt-1 w-32 rounded-md border-slate-300"></div>
    <label class="inline-flex items-center gap-2 text-sm">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $solution->is_active ?? true))> Active
    </label>
    <div class="flex gap-2">
        <button class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Save</button>
        <a href="{{ route('admin.solutions.index') }}" class="px-4 py-2 rounded-md border border-slate-300 text-sm">Cancel</a>
    </div>
</form>
@endsection