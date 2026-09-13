<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function admin(): User
    {
        $role = Role::create(['name' => 'Admin', 'slug' => 'admin', 'permissions' => ['*']]);
        return User::create([
            'role_id' => $role->id,
            'name' => 'Admin',
            'email' => 'a@b.com',
            'password' => Hash::make('SecretPass123'),
            'is_active' => true,
        ]);
    }

    public function test_dashboard_accessible(): void
    {
        $this->actingAs($this->admin())->get('/admin')->assertOk();
    }

    public function test_crud_pages_load(): void
    {
        $user = $this->admin();
        foreach ([
            '/admin/users',
            '/admin/brands',
            '/admin/solutions',
            '/admin/industries',
            '/admin/products',
            '/admin/careers',
            '/admin/articles',
            '/admin/quotes',
            '/admin/contact-messages',
            '/admin/media',
            '/admin/company-info',
            '/admin/audit-logs',
        ] as $path) {
            $this->actingAs($user)->get($path)->assertOk();
        }
    }
}