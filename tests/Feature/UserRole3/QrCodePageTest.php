<?php

namespace Tests\Feature\UserRole3;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;

class QrCodePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_qr_can_not_be_rendered_by_role_3_with_reserve_is_checked()
    {
        $manager = User::factory()->create(['role' => 3]);
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['user_id' => $manager->id]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'status' => 'checked'
        ]);

        $response = $this->actingAs($manager)
            ->get('/manager/reserves/'.$reserve->id);

        $response->assertRedirect('manager');
    }

    public function test_qr_can_be_rendered_by_role_3_with_reserve_is_reserved()
    {
        $manager = User::factory()->create(['role' => 3]);
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['user_id' => $manager->id]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ]);

        $response = $this->actingAs($manager)
            ->get('/manager/reserves/'.$reserve->id);

        $response->assertStatus(200);
    }
}
