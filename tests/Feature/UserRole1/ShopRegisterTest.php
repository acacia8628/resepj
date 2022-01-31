<?php

namespace Tests\Feature\UserRole1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;

class ShopRegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_register_shop_by_user_role_1()
    {
        $user = User::factory()->create(['role' => 1]);
        $area = Area::factory()->create(['id' => 1]);
        $genre = Genre::factory()->create(['id' => 1]);

        $response = $this->actingAs($user)
            ->post('/admin/adminShops', [
                'shop_name' => 'Test Shop',
                'area_id' => $area->id,
                'genre_id' => $genre->id,
            ]);

        $response->assertRedirect('admin');
    }
}
