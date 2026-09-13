<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\CompanyInfo;
use App\Models\Industry;
use App\Models\Solution;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('about', ['info' => CompanyInfo::pluck('value', 'key')]);
    }

    public function solutions(): View
    {
        return view('solutions', [
            'solutions' => Solution::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function solutionShow(Solution $solution): View
    {
        abort_unless($solution->is_active, 404);
        return view('solutions', [
            'solutions' => Solution::where('is_active', true)->orderBy('sort_order')->get(),
            'current' => $solution,
        ]);
    }

public function brands(): View
{
    $brands = Brand::where('is_active', true)
        ->orderBy('sort_order')
        ->get()
        ->groupBy('category');

    return view('brands', compact('brands'));
}

public function brandShow(Brand $brand): View
{
    abort_unless($brand->is_active, 404);

    $brands = Brand::where('is_active', true)
        ->orderBy('sort_order')
        ->get()
        ->groupBy('category');

    return view('brands', [
        'brands' => $brands,
        'current' => $brand->load('products'),
    ]);
}



    public function industries(): View
    {
        return view('industries', [
            'industries' => Industry::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function industryShow(Industry $industry): View
    {
        abort_unless($industry->is_active, 404);
        return view('industries', [
            'industries' => Industry::where('is_active', true)->orderBy('sort_order')->get(),
            'current' => $industry,
        ]);
    }

    public function articles(): View
    {
        return view('articles', ['articles' => Article::published()->latest('published_at')->paginate(10)]);
    }

    public function articleShow(Article $article): View
    {
        abort_unless($article->is_published && $article->published_at?->isPast(), 404);
        return view('article-show', ['article' => $article]);
    }
}