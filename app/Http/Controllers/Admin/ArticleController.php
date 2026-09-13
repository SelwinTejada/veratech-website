<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\AuditService;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('admin.articles.index', ['articles' => Article::latest()->paginate(20)]);
    }

    public function create(): View
    {
        return view('admin.articles.form', ['article' => new Article()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['user_id'] = $request->user()->id;
        if ($data['is_published'] ?? false) {
            $data['published_at'] = $data['published_at'] ?? now();
        }
        if ($request->hasFile('image_file')) {
            $data['image'] = MediaService::store($request->file('image_file'), 'articles')->path;
        }
        unset($data['image_file']);
        $article = Article::create($data);
        AuditService::log('article.create', "Created article {$article->title}", $article);
        return redirect()->route('admin.articles.index')->with('success', 'Article created.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.form', ['article' => $article]);
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        if ($data['is_published'] ?? false) {
            $data['published_at'] = $data['published_at'] ?? now();
        }
        if ($request->hasFile('image_file')) {
            $data['image'] = MediaService::store($request->file('image_file'), 'articles')->path;
        }
        unset($data['image_file']);
        $article->update($data);
        AuditService::log('article.update', "Updated article {$article->title}", $article);
        return redirect()->route('admin.articles.index')->with('success', 'Article updated.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        AuditService::log('article.delete', "Deleted article {$article->title}", $article);
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted.');
    }

    public function show(Article $article): RedirectResponse
    {
        return redirect()->route('admin.articles.edit', $article);
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:220'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
            'image_file' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}