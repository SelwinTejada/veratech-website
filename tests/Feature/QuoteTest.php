<?php

namespace Tests\Feature;

use App\Models\Quote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_quote_request_creates_record(): void
    {
        Mail::fake();
        $response = $this->post('/quote', [
            'name' => 'Acme Corp',
            'email' => 'buyer@acme.test',
            'message' => 'We need 100 firewalls.',
        ]);
        $response->assertRedirect('/quote');
        $this->assertSame(1, Quote::count());
    }

    public function test_quote_validation(): void
    {
        $this->post('/quote', [])->assertSessionHasErrors(['name', 'email', 'message']);
    }
}