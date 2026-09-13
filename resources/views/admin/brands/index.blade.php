@extends('layouts.admin')
@section('page_title', 'Brands')

@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.brands.create') }}" class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">+ New brand</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600"><tr>
            <th class="text-left px-4 py-3">Name</th><th class="text-left px-4 py-3">Slug</th>
            <th class="text-left px-4 py-3">Active</th><th></th>
        </tr></thead>
        <tbody>
        @foreach ($brands as $brand)
            <tr class="border-t border-slate-100">
                <td class="px-4 py-3">{{ $brand->name }}</td>
                <td class="px-4 py-3">{{ $brand->slug }}</td>
                <td class="px-4 py-3">{{ $brand->is_active ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.brands.edit', $brand) }}" class="text-sky-700 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.brands.destroy', $brand) }}" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="text-rose-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $brands->links() }}</div>
@endsection