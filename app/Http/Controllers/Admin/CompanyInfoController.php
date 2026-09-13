<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Services\AuditService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyInfoController extends Controller
{
    public const KEYS = [
        'company_name', 'tagline', 'address', 'phone', 'email',
        'commitment', 'line_of_business', 'contact_cta',
        'facebook', 'linkedin', 'twitter',
    ];

    public function edit(): View
    {
        return view('admin.company-info.edit', [
            'info' => CompanyInfo::pluck('value', 'key'),
            'keys' => self::KEYS,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'company_name' => ['required', 'string', 'max:150'],
            'tagline' => ['nullable', 'string', 'max:250'],
            'address' => ['nullable', 'string', 'max:300'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:200'],
            'commitment' => ['nullable', 'string'],
            'line_of_business' => ['nullable', 'string'],
            'contact_cta' => ['nullable', 'string', 'max:300'],
            'facebook' => ['nullable', 'url', 'max:250'],
            'linkedin' => ['nullable', 'url', 'max:250'],
            'twitter' => ['nullable', 'url', 'max:250'],
        ]);

        foreach ($data as $k => $v) {
            CompanyInfo::updateOrCreate(['key' => $k], ['value' => $v]);
        }
        AuditService::log('company_info.update', 'Updated company information');
        return back()->with('success', 'Company information saved.');
    }
}