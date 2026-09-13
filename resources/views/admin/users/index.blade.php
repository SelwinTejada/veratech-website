@extends('layouts.admin')
@section('page_title', 'Users')

@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">+ New user</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600">
            <tr>
                <th class="text-left px-4 py-3">Name</th>
                <th class="text-left px-4 py-3">Email</th>
                <th class="text-left px-4 py-3">Role</th>
                <th class="text-left px-4 py-3">Active</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">{{ $user->role?->name }}</td>
                    <td class="px-4 py-3">{{ $user->is_active ? 'Yes' : 'No' }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-sky-700 hover:underline">Edit</a>
                        @if ($user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Delete user?')">
                                @csrf @method('DELETE')
                                <button class="text-rose-600 hover:underline">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $users->links() }}</div>
@endsection