@extends('layouts.admin')
@section('page_title', $user->exists ? 'Edit user' : 'New user')

@section('content')
<form method="POST" action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-xl space-y-4">
    @csrf
    @if ($user->exists) @method('PUT') @endif

    <div>
        <label class="block text-sm font-medium">Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="mt-1 w-full rounded-md border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 w-full rounded-md border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-medium">Password {{ $user->exists ? '(leave empty to keep)' : '' }}</label>
        <input type="password" name="password" class="mt-1 w-full rounded-md border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-medium">Confirm password</label>
        <input type="password" name="password_confirmation" class="mt-1 w-full rounded-md border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-medium">Role</label>
        <select name="role_id" class="mt-1 w-full rounded-md border-slate-300">
            <option value="">— None —</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <label class="inline-flex items-center gap-2 text-sm">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $user->is_active ?? true)) class="rounded border-slate-300"> Active
    </label>

    <div class="flex gap-2">
        <button type="submit" class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Save</button>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 rounded-md border border-slate-300 text-sm">Cancel</a>
    </div>
</form>
@endsection