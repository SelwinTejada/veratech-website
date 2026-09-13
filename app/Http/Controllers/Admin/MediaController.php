<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Services\AuditService;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(): View
    {
        return view('admin.media.index', ['media' => Media::latest()->paginate(24)]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => ['required', 'file', 'max:'.MediaService::MAX_SIZE_KB],
        ]);

        try {
            $media = MediaService::store($request->file('file'), 'media');
            AuditService::log('media.upload', "Uploaded {$media->original_name}", $media);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'File uploaded.');
    }

    public function destroy(Media $medium): RedirectResponse
    {
        AuditService::log('media.delete', "Deleted {$medium->original_name}", $medium);
        MediaService::delete($medium);
        return back()->with('success', 'File deleted.');
    }
}