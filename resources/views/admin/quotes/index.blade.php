@extends('layouts.admin')
@section('page_title', 'Quote Requests')

@section('content')
<form method="GET" class="mb-4 flex gap-2">
    <select name="status" class="rounded-md border-slate-300 text-sm">
        <option value="">All statuses</option>
        @foreach (['new','in-progress','closed','spam'] as $s)
            <option value="{{ $s }}" @selected($status === $s)>{{ ucfirst($s) }}</option>
        @endforeach
    </select>
    <button class="px-3 py-2 rounded-md bg-slate-800 text-white text-sm">Filter</button>
</form>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600"><tr>
            <th class="text-left px-4 py-3">From</th><th class="text-left px-4 py-3">Subject</th>
            <th class="text-left px-4 py-3">Status</th><th class="text-left px-4 py-3">Received</th><th></th>
        </tr></thead>
        <tbody>
        @foreach ($quotes as $q)
            <tr class="border-t border-slate-100">
                <td class="px-4 py-3">{{ $q->name }}<div class="text-xs text-slate-500">{{ $q->email }}</div></td>
                <td class="px-4 py-3">{{ $q->subject }}</td>
                <td class="px-4 py-3">{{ $q->status }}</td>
                <td class="px-4 py-3">{{ $q->created_at->format('Y-m-d H:i') }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.quotes.show', $q) }}" class="text-sky-700 hover:underline">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $quotes->links() }}</div>
@endsection