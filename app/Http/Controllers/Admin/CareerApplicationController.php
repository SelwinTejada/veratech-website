<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use App\Services\AuditService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CareerApplicationController extends Controller
{
    public function index(): View
    {
        return view('admin.career-applications.index', [
            'applications' => CareerApplication::with('career')->latest()->paginate(20),
        ]);
    }

    public function show(CareerApplication $application): View
    {
        return view('admin.career-applications.index', [
            'applications' => CareerApplication::with('career')->latest()->paginate(20),
            'current' => $application,
        ]);
    }

    public function download(CareerApplication $application): Response
    {
        abort_unless(Storage::disk('public')->exists($application->resume_path), 404);
        return response()->download(
            Storage::disk('public')->path($application->resume_path),
            $application->name.'-resume.'.pathinfo($application->resume_path, PATHINFO_EXTENSION)
        );
    }

    public function destroy(CareerApplication $application): RedirectResponse
    {
        AuditService::log('application.delete', "Deleted application {$application->id}", $application);
        Storage::disk('public')->delete($application->resume_path);
        $application->delete();
        return redirect()->route('admin.career-applications.index')->with('success', 'Application deleted.');
    }
}