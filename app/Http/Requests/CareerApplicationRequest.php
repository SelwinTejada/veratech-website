<?php

namespace App\Http\Requests;

use App\Services\MediaService;
use Illuminate\Foundation\Http\FormRequest;

class CareerApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email:rfc,dns', 'max:200'],
            'phone' => ['nullable', 'string', 'max:40'],
            'cover_letter' => ['nullable', 'string', 'max:10000'],
            'resume' => [
                'required',
                'file',
                'max:'.MediaService::MAX_SIZE_KB,
                'mimes:pdf,doc,docx',
            ],
        ];
    }
}