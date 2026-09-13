<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Services\AuditService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::with('role')->latest()->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.users.form', [
            'user' => new User(),
            'roles' => Role::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:200', 'unique:users,email'],
            'password' => ['required', 'string', 'min:10', 'confirmed'],
            'role_id' => ['nullable', 'exists:roles,id'],
            'is_active' => ['boolean'],
        ]);

        $user = User::create($data);
        AuditService::log('user.create', "Created user {$user->email}", $user);
        return redirect()->route('admin.users.index')->with('success', 'User created.');
    }

    public function edit(User $user): View
    {
        return view('admin.users.form', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:200', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:10', 'confirmed'],
            'role_id' => ['nullable', 'exists:roles,id'],
            'is_active' => ['boolean'],
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);
        AuditService::log('user.update', "Updated user {$user->email}", $user);
        return redirect()->route('admin.users.index')->with('success', 'User updated.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($user->id === $request->user()->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        AuditService::log('user.delete', "Deleted user {$user->email}", $user);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }

    public function show(User $user): RedirectResponse
    {
        return redirect()->route('admin.users.edit', $user);
    }
}