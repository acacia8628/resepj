<?php

namespace Tests\Feature\UserRole5;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;

class QrCodeTest extends TestCase
{
    use RefreshDatabase;

    public function test_qr_can_not_be_rendered_by_user_with_reserve_is_checked()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'status' => 'checked',
        ]);

        $response = $this->actingAs($user)->get('/qrCodes/'. $reserve->id);

        $response->assertRedirect('mypage');
    }

    public function test_qr_can_be_rendered_by_user_with_reserve_is_reserved()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ]);

        $response = $this->actingAs($user)->get('/qrCodes/'. $reserve->id);

        $response->assertStatus(200);
    }
}
