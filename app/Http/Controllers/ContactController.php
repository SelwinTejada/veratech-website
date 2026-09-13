<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['ip_address'] = $request->ip();

        $message = ContactMessage::create($data);

        try {
            Mail::raw(
                "New contact message from {$message->name} <{$message->email}>\n\n{$message->message}",
                function ($m) {
                    $m->to(config('mail.from.address'))
                        ->subject('New contact message — Veratech');
                }
            );
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()->route('contact')->with('success', 'Thank you, we will be in touch shortly.');
    }
}