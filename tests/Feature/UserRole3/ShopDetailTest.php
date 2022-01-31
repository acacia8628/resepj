<?php

namespace Tests\Feature\UserRole3;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_update_shop_detail_by_role_3()
    {
        $shop = Shop::factory()->create([
            'user_id' => User::factory()->create([
                'role' => 3
            ])
        ]);
        $area = Area::factory()->create(['id' => 10]);
        $genre = Genre::factory()->create(['id' => 10]);

        $response = $this->actingAs($shop->user)
            ->patch('/manager/managerShops/'. $shop->id, [
            'genre_id' => $genre->id,
            'area_id' => $area->id,
            'shop_name' => $shop->name,
            'overview' => Str::random(20),
            'public' => 1,
        ]);

        $response->assertRedirect('manager');
    }
}
