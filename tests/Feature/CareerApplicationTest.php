<?php

namespace Tests\Feature;

use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CareerApplicationTest extends TestCase
{
    use RefreshDatabase;

    protected function makeCareer(): Career
    {
        return Career::create([
            'title' => 'Engineer',
            'slug' => 'engineer',
            'type' => 'full-time',
            'is_active' => true,
        ]);
    }

    public function test_application_stores_resume(): void
    {
        Storage::fake('public');
        $career = $this->makeCareer();

        $response = $this->post("/careers/{$career->slug}/apply", [
            'name' => 'Test Applicant',
            'email' => 'applicant@example.com',
            'phone' => '555',
            'cover_letter' => 'Hello',
            'resume' => UploadedFile::fake()->create('cv.pdf', 200, 'application/pdf'),
        ]);

        $response->assertRedirect(route('careers.show', $career));
        $this->assertSame(1, CareerApplication::count());
        $this->assertNotNull(CareerApplication::first()->resume_path);
    }

    public function test_resume_required(): void
    {
        $career = $this->makeCareer();
        $this->post("/careers/{$career->slug}/apply", [
            'name' => 'Test',
            'email' => 'a@b.com',
        ])->assertSessionHasErrors('resume');
    }

    public function test_resume_must_be_acceptable_type(): void
    {
        Storage::fake('public');
        $career = $this->makeCareer();
        $this->post("/careers/{$career->slug}/apply", [
            'name' => 'Test',
            'email' => 'a@b.com',
            'resume' => UploadedFile::fake()->create('script.exe', 10, 'application/octet-stream'),
        ])->assertSessionHasErrors('resume');
    }
}