<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Services\AuditService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(): View
    {
        return view('admin.contact-messages.index', [
            'messages' => ContactMessage::latest()->paginate(20),
        ]);
    }

    public function show(ContactMessage $message): View
    {
        if ($message->status === 'new') {
            $message->update(['status' => 'read']);
        }
        return view('admin.contact-messages.show', ['message' => $message]);
    }

    public function destroy(ContactMessage $message): RedirectResponse
    {
        AuditService::log('contact.delete', "Deleted contact message {$message->id}", $message);
        $message->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted.');
    }
}