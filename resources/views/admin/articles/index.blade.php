@extends('layouts.admin')
@section('page_title', 'Articles')

@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.articles.create') }}" class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">+ New</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600"><tr>
            <th class="text-left px-4 py-3">Title</th><th class="text-left px-4 py-3">Published</th>
            <th class="text-left px-4 py-3">Date</th><th></th>
        </tr></thead>
        <tbody>
        @foreach ($articles as $a)
            <tr class="border-t border-slate-100">
                <td class="px-4 py-3">{{ $a->title }}</td>
                <td class="px-4 py-3">{{ $a->is_published ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-3">{{ $a->published_at?->format('Y-m-d') }}</td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.articles.edit', $a) }}" class="text-sky-700 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.articles.destroy', $a) }}" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="text-rose-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $articles->links() }}</div>
@endsection