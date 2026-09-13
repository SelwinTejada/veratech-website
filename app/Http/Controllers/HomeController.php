<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\CompanyInfo;
use App\Models\Industry;
use App\Models\Solution;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'brands' => Brand::where('is_active', true)->orderBy('sort_order')->take(10)->get(),
            'solutions' => Solution::where('is_active', true)->orderBy('sort_order')->take(6)->get(),
            'industries' => Industry::where('is_active', true)->orderBy('sort_order')->take(6)->get(),
            'articles' => Article::published()->latest('published_at')->take(3)->get(),
            'info' => CompanyInfo::pluck('value', 'key'),
        ]);
    }
}