<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function makeAdmin(): User
    {
        $role = Role::create(['name' => 'Admin', 'slug' => 'admin', 'permissions' => ['*']]);
        return User::create([
            'role_id' => $role->id,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('SecretPass123'),
            'is_active' => true,
        ]);
    }

    public function test_login_page_loads(): void
    {
        $this->get('/admin/login')->assertOk();
    }

    public function test_admin_can_login(): void
    {
        $this->makeAdmin();
        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'SecretPass123',
        ]);
        $response->assertRedirect('/admin');
        $this->assertAuthenticated();
    }

    public function test_invalid_credentials_rejected(): void
    {
        $this->makeAdmin();
        $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'wrong',
        ])->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_admin_routes_require_authentication(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_non_admin_user_is_forbidden(): void
    {
        $role = Role::create(['name' => 'Viewer', 'slug' => 'viewer', 'permissions' => []]);
        $user = User::create([
            'role_id' => $role->id,
            'name' => 'Viewer',
            'email' => 'viewer@example.com',
            'password' => Hash::make('SecretPass123'),
            'is_active' => true,
        ]);
        $this->actingAs($user)->get('/admin')->assertForbidden();
    }
}