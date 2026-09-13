@extends('layouts.admin')
@section('page_title', 'Solutions')

@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.solutions.create') }}" class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">+ New</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600"><tr>
            <th class="text-left px-4 py-3">Title</th><th class="text-left px-4 py-3">Active</th><th></th>
        </tr></thead>
        <tbody>
        @foreach ($solutions as $s)
            <tr class="border-t border-slate-100">
                <td class="px-4 py-3">{{ $s->title }}</td>
                <td class="px-4 py-3">{{ $s->is_active ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.solutions.edit', $s) }}" class="text-sky-700 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.solutions.destroy', $s) }}" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="text-rose-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $solutions->links() }}</div>
@endsection