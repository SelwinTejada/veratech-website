@extends('layouts.admin')
@section('page_title', 'Dashboard')
@section('title', 'Dashboard — Admin')

@section('content')
<div class="grid gap-4 md:grid-cols-4">
    <div class="bg-white rounded-xl border border-slate-200 p-5">
        <div class="text-slate-500 text-xs uppercase">New quotes</div>
        <div class="mt-1 text-3xl font-bold">{{ $counts['unread_quotes'] }}</div>
        <a href="{{ route('admin.quotes.index', ['status' => 'new']) }}" class="text-xs text-sky-700 hover:underline">View →</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 p-5">
        <div class="text-slate-500 text-xs uppercase">Contact messages</div>
        <div class="mt-1 text-3xl font-bold">{{ $counts['messages'] }}</div>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 p-5">
        <div class="text-slate-500 text-xs uppercase">Applications</div>
        <div class="mt-1 text-3xl font-bold">{{ $counts['applications'] }}</div>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 p-5">
        <div class="text-slate-500 text-xs uppercase">Users</div>
        <div class="mt-1 text-3xl font-bold">{{ $counts['users'] }}</div>
    </div>
</div>

<div class="grid gap-6 md:grid-cols-2 mt-6">
    <div class="bg-white rounded-xl border border-slate-200 p-5">
        <h2 class="font-semibold mb-3">Recent quote requests</h2>
        <ul class="divide-y divide-slate-100 text-sm">
            @foreach ($recent_quotes as $q)
                <li class="py-2 flex justify-between">
                    <a href="{{ route('admin.quotes.show', $q) }}" class="hover:underline">{{ $q->name }} — {{ Str::limit($q->subject, 40) }}</a>
                    <span class="text-slate-500">{{ $q->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 p-5">
        <h2 class="font-semibold mb-3">Recent contact messages</h2>
        <ul class="divide-y divide-slate-100 text-sm">
            @foreach ($recent_messages as $m)
                <li class="py-2 flex justify-between">
                    <a href="{{ route('admin.contact-messages.show', $m) }}" class="hover:underline">{{ $m->name }} — {{ Str::limit($m->subject, 40) }}</a>
                    <span class="text-slate-500">{{ $m->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection