<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MediaService
{
    public const ALLOWED_MIMES = [
        'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml',
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    ];

    public const MAX_SIZE_KB = 8192;

    public static function store(UploadedFile $file, string $folder = 'uploads'): Media
    {
        $mime = $file->getMimeType();
        if (! in_array($mime, self::ALLOWED_MIMES, true)) {
            throw new \RuntimeException('File type not allowed: '.$mime);
        }

        $originalName = $file->getClientOriginalName();
        $ext = strtolower($file->getClientOriginalExtension());
        $safeExt = preg_replace('/[^a-z0-9]/', '', $ext);
        $filename = Str::uuid()->toString().($safeExt ? '.'.$safeExt : '');

        $path = $file->storeAs($folder, $filename, 'public');

        return Media::create([
            'user_id' => Auth::id(),
            'filename' => $filename,
            'original_name' => $originalName,
            'mime_type' => $mime,
            'size' => $file->getSize(),
            'path' => $path,
            'disk' => 'public',
        ]);
    }

    public static function delete(Media $media): void
    {
        \Storage::disk($media->disk)->delete($media->path);
        $media->delete();
    }
}