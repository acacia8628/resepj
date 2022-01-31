<?php

namespace Tests\Feature\Middleware;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;

class CanIsManagerTest extends TestCase
{
    use RefreshDatabase;

    public function test_manager_index_can_be_rendered_by_role_3()
    {
        $user = User::factory()->create([
            'role' => 3
        ]);
        $shop = Shop::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/manager', ['shop' => $shop]);
        $response->assertStatus(200);
    }

    public function test_manager_index_can_not_be_rendered_by_guest()
    {
        $response = $this->get('/manager');
        $response->assertStatus(302);
    }

    public function test_manager_index_can_not_be_rendered_by_role_5()
    {
        $user = User::factory()->create([
            'role' => 5
        ]);

        $response = $this->actingAs($user)->get('/manager');
        $response->assertStatus(403);
    }
}
