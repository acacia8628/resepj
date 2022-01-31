<?php

namespace Tests\Feature\Middleware;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class GuestTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_can_not_be_rendered_by_role_5()
    {
        $user = User::factory()->create([
            'role' => 5
        ]);

        $response = $this->actingAs($user)->get('/admin/login');
        $response->assertStatus(302);
    }

    public function test_admin_login_can_be_rendered_by_guest()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }
}
