<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Models\Brand;
use App\Models\Quote;
use App\Models\Solution;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class QuoteController extends Controller
{
    public function show(): View
    {
        return view('quote', [
            'brands' => Brand::where('is_active', true)->orderBy('name')->get(),
            'solutions' => Solution::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function store(QuoteRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['ip_address'] = $request->ip();

        $quote = Quote::create($data);

        try {
            Mail::raw(
                "New quote request from {$quote->name} <{$quote->email}>\n\n{$quote->message}",
                function ($m) {
                    $m->to(config('mail.from.address'))
                        ->subject('New quote request — Veratech');
                }
            );
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()->route('quote')->with('success', 'Your quote request has been received.');
    }
}