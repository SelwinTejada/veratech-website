@extends('layouts.admin')
@section('page_title', 'Audit Logs')

@section('content')
<form method="GET" class="mb-4 flex gap-2">
    <input type="text" name="action" value="{{ $action }}" placeholder="Filter action (e.g. user.)" class="rounded-md border-slate-300 text-sm">
    <button class="px-3 py-2 rounded-md bg-slate-800 text-white text-sm">Filter</button>
</form>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600"><tr>
            <th class="text-left px-4 py-3">When</th>
            <th class="text-left px-4 py-3">User</th>
            <th class="text-left px-4 py-3">Action</th>
            <th class="text-left px-4 py-3">Description</th>
            <th class="text-left px-4 py-3">IP</th>
        </tr></thead>
        <tbody>
        @foreach ($logs as $log)
            <tr class="border-t border-slate-100">
                <td class="px-4 py-3 whitespace-nowrap">{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                <td class="px-4 py-3">{{ $log->user?->email ?? '—' }}</td>
                <td class="px-4 py-3 font-mono text-xs">{{ $log->action }}</td>
                <td class="px-4 py-3">{{ $log->description }}</td>
                <td class="px-4 py-3 font-mono text-xs">{{ $log->ip_address }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $logs->links() }}</div>
@endsection