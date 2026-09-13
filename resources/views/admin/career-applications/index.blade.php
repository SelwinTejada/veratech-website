@extends('layouts.admin')
@section('page_title', 'Career Applications')

@section('content')
<div class="grid gap-6 {{ isset($current) ? 'md:grid-cols-2' : '' }}">
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600"><tr>
                <th class="text-left px-4 py-3">Name</th><th class="text-left px-4 py-3">Position</th>
                <th class="text-left px-4 py-3">Date</th><th></th>
            </tr></thead>
            <tbody>
            @foreach ($applications as $a)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-3">{{ $a->name }}<div class="text-xs text-slate-500">{{ $a->email }}</div></td>
                    <td class="px-4 py-3">{{ $a->career?->title }}</td>
                    <td class="px-4 py-3">{{ $a->created_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.career-applications.show', $a) }}" class="text-sky-700 hover:underline">View</a>
                        <form method="POST" action="{{ route('admin.career-applications.destroy', $a) }}" class="inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="text-rose-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $applications->links() }}</div>
    </div>

    @isset($current)
        <div class="bg-white rounded-xl border border-slate-200 p-6 space-y-3">
            <h2 class="font-semibold text-lg">{{ $current->name }}</h2>
            <div class="text-sm text-slate-600">{{ $current->email }} · {{ $current->phone }}</div>
            <div class="text-sm text-slate-600">Position: {{ $current->career?->title }}</div>
            <div class="text-sm text-slate-600">Submitted: {{ $current->created_at->format('Y-m-d H:i') }}</div>
            @if ($current->cover_letter)
                <div class="text-sm whitespace-pre-line border-t border-slate-100 pt-3">{{ $current->cover_letter }}</div>
            @endif
        </div>
    @endisset
</div>
@endsection