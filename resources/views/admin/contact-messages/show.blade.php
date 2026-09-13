@extends('layouts.admin')
@section('page_title', 'Contact Message')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-3">
    <h2 class="font-semibold text-lg">{{ $message->name }}</h2>
    <div class="text-sm text-slate-600">{{ $message->email }} · {{ $message->phone }}</div>
    <div class="text-sm"><strong>Subject:</strong> {{ $message->subject }}</div>
    <div class="text-sm whitespace-pre-line border-t border-slate-100 pt-3">{{ $message->message }}</div>

    <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}" onsubmit="return confirm('Delete message?')" class="pt-4">
        @csrf @method('DELETE')
        <button class="text-rose-600 text-sm hover:underline">Delete message</button>
    </form>
</div>
@endsection