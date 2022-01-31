<?php

namespace Tests\Feature\UserRole1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;

class ManagerRegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_manager_can_register_by_role_1()
    {
        $user = User::factory()->create([
            'role' => 1
        ]);
        $shop = Shop::factory()->create([
            'id' => 1
        ]);

        $response = $this->actingAs($user)
            ->post('/admin/adminRegisters', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'shop_id' => $shop->id,
            ]);

        $this->assertAuthenticated();
        $response->assertRedirect('admin');
    }
}
