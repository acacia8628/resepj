<?php

namespace Tests\Feature\Middleware;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class CanIsAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_index_can_be_rendered_by_role_1()
    {
        $user = User::factory()->create(['role' => 1]);

        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(200);
    }

    public function test_admin_index_can_not_be_rendered_by_guest()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);
    }

    public function test_admin_index_can_not_be_rendered_by_role_5()
    {
        $user = User::factory()->create([
            'role' => 5
        ]);

        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(403);
    }
}
