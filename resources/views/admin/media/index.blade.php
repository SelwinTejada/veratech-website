@extends('layouts.admin')
@section('page_title', 'Media Library')

@section('content')
<form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 mb-6 flex gap-3 items-end max-w-2xl">
    @csrf
    <div class="flex-1">
        <label class="block text-sm font-medium">Upload file (max 8MB)</label>
        <input type="file" name="file" required class="mt-1 w-full">
    </div>
    <button class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Upload</button>
</form>

<div class="grid gap-4 grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
    @foreach ($media as $m)
        <div class="bg-white rounded-xl border border-slate-200 p-3">
            @if (str_starts_with($m->mime_type, 'image/'))
                <img src="{{ $m->url() }}" class="h-28 w-full object-cover rounded">
            @else
                <div class="h-28 grid place-items-center text-slate-400 text-xs">{{ $m->mime_type }}</div>
            @endif
            <div class="mt-2 text-xs truncate" title="{{ $m->original_name }}">{{ $m->original_name }}</div>
            <form method="POST" action="{{ route('admin.media.destroy', $m) }}" onsubmit="return confirm('Delete file?')" class="mt-2">
                @csrf @method('DELETE')
                <button class="text-rose-600 text-xs hover:underline">Delete</button>
            </form>
        </div>
    @endforeach
</div>
<div class="mt-4">{{ $media->links() }}</div>
@endsection