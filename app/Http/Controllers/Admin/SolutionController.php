<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Services\AuditService;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SolutionController extends Controller
{
    public function index(): View
    {
        return view('admin.solutions.index', ['solutions' => Solution::orderBy('sort_order')->paginate(20)]);
    }

    public function create(): View
    {
        return view('admin.solutions.form', ['solution' => new Solution()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        if ($request->hasFile('image_file')) {
            $data['image'] = MediaService::store($request->file('image_file'), 'solutions')->path;
        }
        unset($data['image_file']);
        $solution = Solution::create($data);
        AuditService::log('solution.create', "Created solution {$solution->title}", $solution);
        return redirect()->route('admin.solutions.index')->with('success', 'Solution created.');
    }

    public function edit(Solution $solution): View
    {
        return view('admin.solutions.form', ['solution' => $solution]);
    }

    public function update(Request $request, Solution $solution): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        if ($request->hasFile('image_file')) {
            $data['image'] = MediaService::store($request->file('image_file'), 'solutions')->path;
        }
        unset($data['image_file']);
        $solution->update($data);
        AuditService::log('solution.update', "Updated solution {$solution->title}", $solution);
        return redirect()->route('admin.solutions.index')->with('success', 'Solution updated.');
    }

    public function destroy(Solution $solution): RedirectResponse
    {
        AuditService::log('solution.delete', "Deleted solution {$solution->title}", $solution);
        $solution->delete();
        return redirect()->route('admin.solutions.index')->with('success', 'Solution deleted.');
    }

    public function show(Solution $solution): RedirectResponse
    {
        return redirect()->route('admin.solutions.edit', $solution);
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