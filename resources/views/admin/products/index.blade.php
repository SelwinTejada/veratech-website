@extends('layouts.admin')
@section('page_title', 'Products')

@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.products.create') }}" class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">+ New</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600"><tr>
            <th class="text-left px-4 py-3">Name</th><th class="text-left px-4 py-3">Brand</th>
            <th class="text-left px-4 py-3">SKU</th><th class="text-left px-4 py-3">Active</th><th></th>
        </tr></thead>
        <tbody>
        @foreach ($products as $p)
            <tr class="border-t border-slate-100">
                <td class="px-4 py-3">{{ $p->name }}</td>
                <td class="px-4 py-3">{{ $p->brand?->name }}</td>
                <td class="px-4 py-3">{{ $p->sku }}</td>
                <td class="px-4 py-3">{{ $p->is_active ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.products.edit', $p) }}" class="text-sky-700 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.products.destroy', $p) }}" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="text-rose-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $products->links() }}</div>
@endsection