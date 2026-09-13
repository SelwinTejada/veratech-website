<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
            'company' => ['nullable', 'string', 'max:200'],
            'subject' => ['nullable', 'string', 'max:200'],
            'product_interest' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }
}