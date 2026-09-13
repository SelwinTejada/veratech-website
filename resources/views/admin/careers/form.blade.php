@extends('layouts.admin')
@section('page_title', $career->exists ? 'Edit career' : 'New career')

@section('content')
<form method="POST" action="{{ $career->exists ? route('admin.careers.update', $career) : route('admin.careers.store') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-4">
    @csrf @if ($career->exists) @method('PUT') @endif
    <div><label class="block text-sm font-medium">Title</label>
        <input type="text" name="title" value="{{ old('title', $career->title) }}" required class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $career->slug) }}" class="mt-1 w-full rounded-md border-slate-300"></div>
    <div class="grid grid-cols-3 gap-3">
        <div><label class="block text-sm font-medium">Department</label>
            <input type="text" name="department" value="{{ old('department', $career->department) }}" class="mt-1 w-full rounded-md border-slate-300"></div>
        <div><label class="block text-sm font-medium">Location</label>
            <input type="text" name="location" value="{{ old('location', $career->location) }}" class="mt-1 w-full rounded-md border-slate-300"></div>
        <div><label class="block text-sm font-medium">Type</label>
            <input type="text" name="type" value="{{ old('type', $career->type ?? 'full-time') }}" class="mt-1 w-full rounded-md border-slate-300"></div>
    </div>
    <div><label class="block text-sm font-medium">Description</label>
        <textarea name="description" rows="6" class="mt-1 w-full rounded-md border-slate-300">{{ old('description', $career->description) }}</textarea></div>
    <div><label class="block text-sm font-medium">Requirements</label>
        <textarea name="requirements" rows="6" class="mt-1 w-full rounded-md border-slate-300">{{ old('requirements', $career->requirements) }}</textarea></div>
    <div><label class="block text-sm font-medium">Closes at</label>
        <input type="date" name="closes_at" value="{{ old('closes_at', $career->closes_at?->format('Y-m-d')) }}" class="mt-1 w-48 rounded-md border-slate-300"></div>
    <label class="inline-flex items-center gap-2 text-sm">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $career->is_active ?? true))> Active
    </label>
    <div class="flex gap-2">
        <button class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Save</button>
        <a href="{{ route('admin.careers.index') }}" class="px-4 py-2 rounded-md border border-slate-300 text-sm">Cancel</a>
    </div>
</form>
@endsection