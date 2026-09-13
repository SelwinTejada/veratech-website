<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Services\AuditService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteController extends Controller
{
    public function index(Request $request): View
    {
        $query = Quote::latest();
        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }
        return view('admin.quotes.index', [
            'quotes' => $query->paginate(20)->withQueryString(),
            'status' => $status,
        ]);
    }

    public function show(Quote $quote): View
    {
        return view('admin.quotes.show', ['quote' => $quote]);
    }

    public function update(Request $request, Quote $quote): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,in-progress,closed,spam'],
            'admin_notes' => ['nullable', 'string'],
        ]);
        $quote->update($data);
        AuditService::log('quote.update', "Updated quote {$quote->id}", $quote, $data);
        return redirect()->route('admin.quotes.show', $quote)->with('success', 'Quote updated.');
    }

    public function destroy(Quote $quote): RedirectResponse
    {
        AuditService::log('quote.delete', "Deleted quote {$quote->id}", $quote);
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('success', 'Quote deleted.');
    }
}