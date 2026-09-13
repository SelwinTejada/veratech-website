@extends('layouts.admin')
@section('page_title', 'Company Information')

@section('content')
<form method="POST" action="{{ route('admin.company-info.update') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-4">
    @csrf @method('PUT')

    @php
        $labels = [
            'company_name' => 'Company name',
            'tagline' => 'Tagline',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'commitment' => 'Commitment (home card)',
            'line_of_business' => 'Line of business (home card)',
            'contact_cta' => 'Contact CTA (home card)',
            'facebook' => 'Facebook URL',
            'linkedin' => 'LinkedIn URL',
            'twitter' => 'Twitter URL',
        ];
    @endphp

    @foreach ($keys as $key)
        <div>
            <label class="block text-sm font-medium">{{ $labels[$key] ?? $key }}</label>
            @if (in_array($key, ['commitment','line_of_business'], true))
                <textarea name="{{ $key }}" rows="3" class="mt-1 w-full rounded-md border-slate-300">{{ old($key, $info[$key] ?? '') }}</textarea>
            @else
                <input type="text" name="{{ $key }}" value="{{ old($key, $info[$key] ?? '') }}" class="mt-1 w-full rounded-md border-slate-300">
            @endif
        </div>
    @endforeach

    <button class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Save</button>
</form>
@endsection