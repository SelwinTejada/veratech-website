@extends('layouts.admin')
@section('page_title', $brand->exists ? 'Edit brand' : 'New brand')

@section('content')
<form method="POST" action="{{ $brand->exists ? route('admin.brands.update', $brand) : route('admin.brands.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-4">
    @csrf
    @if ($brand->exists) @method('PUT') @endif

    <div>
        <label class="block text-sm font-medium">Name</label>
        <input type="text" name="name" value="{{ old('name', $brand->name) }}" required class="mt-1 w-full rounded-md border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-medium">Slug (auto if empty)</label>
        <input type="text" name="slug" value="{{ old('slug', $brand->slug) }}" class="mt-1 w-full rounded-md border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-medium">Description</label>
        <textarea name="description" rows="3" class="mt-1 w-full rounded-md border-slate-300">{{ old('description', $brand->description) }}</textarea>
    </div>
    <div>
        <label class="block text-sm font-medium">Website</label>
        <input type="url" name="website" value="{{ old('website', $brand->website) }}" class="mt-1 w-full rounded-md border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-medium">Logo</label>
        <input type="file" name="logo_file" accept="image/*" class="mt-1 w-full">
        @if ($brand->logo)<img src="{{ asset('storage/'.$brand->logo) }}" class="mt-2 h-12">@endif
    </div>
    <div>
        <label class="block text-sm font-medium">Sort order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $brand->sort_order ?? 0) }}" class="mt-1 w-32 rounded-md border-slate-300">
    </div>
    <label class="inline-flex items-center gap-2 text-sm">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $brand->is_active ?? true))> Active
    </label>

    <div class="flex gap-2">
        <button class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Save</button>
        <a href="{{ route('admin.brands.index') }}" class="px-4 py-2 rounded-md border border-slate-300 text-sm">Cancel</a>
    </div>
</form>
@endsection