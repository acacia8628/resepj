<?php

namespace Tests\Feature\UserRole5;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Review;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_review_by_role_5()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'status' => 'checked',
        ]);

        $response = $this->actingAs($user)
            ->post('/reviews', [
                'shop_id' => $shop->id,
                'score' => 3,
                'comment' => 'test comment'
            ]);

        $this->assertDatabaseCount('reviews', 1);
        $response->assertStatus(302);
    }

    public function test_can_delete_review_by_role_5()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $review = Review::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ]);

        $this->assertDatabaseCount('reviews', 1);

        $response = $this->actingAs($user)
            ->delete('/reviews/'. $review->id);

        $this->assertDatabaseCount('reviews', 0);
        $response->assertStatus(302);
    }
}
