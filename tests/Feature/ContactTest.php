<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submission_creates_record(): void
    {
        Mail::fake();
        $response = $this->post('/contact', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '555-1234',
            'subject' => 'Hello',
            'message' => 'This is a test message.',
        ]);
        $response->assertRedirect('/contact');
        $this->assertDatabaseHas('contact_messages', ['email' => 'jane@example.com']);
        $this->assertSame(1, ContactMessage::count());
    }

    public function test_contact_validation(): void
    {
        $this->post('/contact', [])->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_contact_rejects_invalid_email(): void
    {
        $this->post('/contact', [
            'name' => 'Jane',
            'email' => 'not-an-email',
            'message' => 'Hello',
        ])->assertSessionHasErrors('email');
    }
}