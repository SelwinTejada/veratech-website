<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Brand;
use App\Models\CareerApplication;
use App\Models\ContactMessage;
use App\Models\Quote;
use App\Models\Solution;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'quotes' => Quote::count(),
                'unread_quotes' => Quote::unread()->count(),
                'messages' => ContactMessage::count(),
                'applications' => CareerApplication::count(),
                'brands' => Brand::count(),
                'solutions' => Solution::count(),
                'articles' => Article::count(),
                'users' => User::count(),
            ],
            'recent_quotes' => Quote::latest()->take(5)->get(),
            'recent_messages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}