<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerApplicationRequest;
use App\Models\Career;
use App\Models\CareerApplication;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        return view('careers', ['careers' => Career::open()->latest()->get()]);
    }

    public function show(Career $career): View
    {
        abort_unless($career->is_active, 404);
        return view('career-show', ['career' => $career]);
    }

    public function apply(CareerApplicationRequest $request, Career $career): RedirectResponse
    {
        abort_unless($career->is_active, 404);

        $data = $request->validated();
        $file = $request->file('resume');

        // Additional content check
        $mime = $file->getMimeType();
        if (! in_array($mime, [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ], true)) {
            return back()->withErrors(['resume' => 'Invalid file type.'])->withInput();
        }

        $path = $file->store('resumes', 'public');

        CareerApplication::create([
            'career_id' => $career->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'cover_letter' => $data['cover_letter'] ?? null,
            'resume_path' => $path,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('careers.show', $career)
            ->with('success', 'Your application has been submitted.');
    }
}