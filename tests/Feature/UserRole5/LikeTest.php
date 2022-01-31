<?php

namespace Tests\Feature\UserRole5;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Like;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_like_by_user_role_5()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $response = $this->actingAs($user)
            ->post('/likes', ['shop_id' => $shop->id]);

        $response->assertStatus(302);
    }

    public function test_can_unlike_by_user_role_5()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);
        $like = Like::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ]);

        $response = $this->actingAs($user)
            ->delete('/likes/'. $shop->id);

        $response->assertStatus(302);
    }
}
