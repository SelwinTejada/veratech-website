@extends('layouts.admin')
@section('page_title', 'Quote Request')

@section('content')
<div class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-3">
    <div class="flex justify-between">
        <h2 class="font-semibold text-lg">{{ $quote->name }}</h2>
        <span class="text-xs bg-slate-100 px-2 py-1 rounded">{{ $quote->status }}</span>
    </div>
    <div class="text-sm text-slate-600">
        {{ $quote->email }} · {{ $quote->phone }} · {{ $quote->company }}
    </div>
    <div class="text-sm"><strong>Interest:</strong> {{ $quote->product_interest }}</div>
    <div class="text-sm"><strong>Subject:</strong> {{ $quote->subject }}</div>
    <div class="text-sm whitespace-pre-line border-t border-slate-100 pt-3">{{ $quote->message }}</div>

    <form method="POST" action="{{ route('admin.quotes.update', $quote) }}" class="pt-4 border-t border-slate-100 space-y-3">
        @csrf @method('PATCH')
        <div>
            <label class="block text-sm font-medium">Status</label>
            <select name="status" class="mt-1 rounded-md border-slate-300">
                @foreach (['new','in-progress','closed','spam'] as $s)
                    <option value="{{ $s }}" @selected($quote->status === $s)>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium">Admin notes</label>
            <textarea name="admin_notes" rows="4" class="mt-1 w-full rounded-md border-slate-300">{{ $quote->admin_notes }}</textarea>
        </div>
        <button class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Save</button>
    </form>

    <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}" onsubmit="return confirm('Delete quote?')" class="pt-3">
        @csrf @method('DELETE')
        <button class="text-rose-600 text-sm hover:underline">Delete quote</button>
    </form>
</div>
@endsection