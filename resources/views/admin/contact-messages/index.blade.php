@extends('layouts.admin')
@section('page_title', 'Contact Messages')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600"><tr>
            <th class="text-left px-4 py-3">From</th><th class="text-left px-4 py-3">Subject</th>
            <th class="text-left px-4 py-3">Status</th><th class="text-left px-4 py-3">Received</th><th></th>
        </tr></thead>
        <tbody>
        @foreach ($messages as $m)
            <tr class="border-t border-slate-100">
                <td class="px-4 py-3">{{ $m->name }}<div class="text-xs text-slate-500">{{ $m->email }}</div></td>
                <td class="px-4 py-3">{{ $m->subject }}</td>
                <td class="px-4 py-3">{{ $m->status }}</td>
                <td class="px-4 py-3">{{ $m->created_at->format('Y-m-d H:i') }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.contact-messages.show', $m) }}" class="text-sky-700 hover:underline">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $messages->links() }}</div>
@endsection