<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Services\AuditService;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class IndustryController extends Controller
{
    public function index(): View
    {
        return view('admin.industries.index', ['industries' => Industry::orderBy('sort_order')->paginate(20)]);
    }

    public function create(): View
    {
        return view('admin.industries.form', ['industry' => new Industry()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        if ($request->hasFile('image_file')) {
            $data['image'] = MediaService::store($request->file('image_file'), 'industries')->path;
        }
        unset($data['image_file']);
        $industry = Industry::create($data);
        AuditService::log('industry.create', "Created industry {$industry->title}", $industry);
        return redirect()->route('admin.industries.index')->with('success', 'Industry created.');
    }

    public function edit(Industry $industry): View
    {
        return view('admin.industries.form', ['industry' => $industry]);
    }

    public function update(Request $request, Industry $industry): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        if ($request->hasFile('image_file')) {
            $data['image'] = MediaService::store($request->file('image_file'), 'industries')->path;
        }
        unset($data['image_file']);
        $industry->update($data);
        AuditService::log('industry.update', "Updated industry {$industry->title}", $industry);
        return redirect()->route('admin.industries.index')->with('success', 'Industry updated.');
    }

    public function destroy(Industry $industry): RedirectResponse
    {
        AuditService::log('industry.delete', "Deleted industry {$industry->title}", $industry);
        $industry->delete();
        return redirect()->route('admin.industries.index')->with('success', 'Industry deleted.');
    }

    public function show(Industry $industry): RedirectResponse
    {
        return redirect()->route('admin.industries.edit', $industry);
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:180'],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:80'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image_file' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}