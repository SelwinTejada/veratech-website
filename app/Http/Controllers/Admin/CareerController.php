<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Services\AuditService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        return view('admin.careers.index', ['careers' => Career::latest()->paginate(20)]);
    }

    public function create(): View
    {
        return view('admin.careers.form', ['career' => new Career()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $career = Career::create($data);
        AuditService::log('career.create', "Created career {$career->title}", $career);
        return redirect()->route('admin.careers.index')->with('success', 'Career created.');
    }

    public function edit(Career $career): View
    {
        return view('admin.careers.form', ['career' => $career]);
    }

    public function update(Request $request, Career $career): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $career->update($data);
        AuditService::log('career.update', "Updated career {$career->title}", $career);
        return redirect()->route('admin.careers.index')->with('success', 'Career updated.');
    }

    public function destroy(Career $career): RedirectResponse
    {
        AuditService::log('career.delete', "Deleted career {$career->title}", $career);
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Career deleted.');
    }

    public function show(Career $career): RedirectResponse
    {
        return redirect()->route('admin.careers.edit', $career);
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:180'],
            'department' => ['nullable', 'string', 'max:120'],
            'location' => ['nullable', 'string', 'max:120'],
            'type' => ['required', 'string', 'max:40'],
            'description' => ['nullable', 'string'],
            'requirements' => ['nullable', 'string'],
            'is_active' => ['boolean'],
            'closes_at' => ['nullable', 'date'],
        ]);
    }
}