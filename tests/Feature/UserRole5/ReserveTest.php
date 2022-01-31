<?php

namespace Tests\Feature\UserRole5;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use Carbon\Carbon;

class ReserveTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_add_reserve_by_role_5()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $response = $this->actingAs($user)
            ->post('/reserves', [
                'shop_id' => $shop->id,
                'r_date' => Carbon::tomorrow(),
                'r_time' => '17:00:00',
                'r_number' => 1,
            ]);

        $this->assertDatabaseCount('reserves', 1);
        $response->assertRedirect('/done');
    }

    public function test_can_not_add_reserve_with_null()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $response = $this->actingAs($user)
            ->post('/reserves', [
                'shop_id' => $shop->id,
                'r_date' => null,
                'r_time' => null,
                'r_number' => null,
            ]);

        $this->assertDatabaseCount('reserves', 0);
        $response->assertRedirect('/');
    }

    public function test_can_delete_reserve_by_role_5()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id
        ]);

        $this->assertDatabaseCount('reserves', 1);

        $response = $this->actingAs($user)
            ->delete('/reserves/'. $reserve->id);

        $this->assertDatabaseCount('reserves', 0);
        $response->assertRedirect('mypage');
    }

    public function test_reserve_edit_can_be_rendered_by_reserved_user()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id
        ]);

        $this->assertDatabaseCount('reserves', 1);

        $response = $this->actingAs($user)
            ->get(route('reserves.edit', $reserve->id));

        $response->assertStatus(200);
    }

    public function test_can_update_reserve_by_role_5()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id
        ]);

        $response = $this->actingAs($user)
            ->patch('/reserves/'. $reserve->id, [
                'r_date' => Carbon::tomorrow(),
                'r_time' => '17:00:00',
                'r_number' => 1,
            ]);

        $this->assertDatabaseCount('reserves', 1);
        $response->assertStatus(302);
    }

    public function test_can_not_update_reserve_with_null()
    {
        $user = User::factory()->create(['role' => 5]);
        $shop = Shop::factory()->create(['public' => 1]);

        $reserve = Reserve::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'reserve_number' => 1,
        ]);

        $response = $this->actingAs($user)
            ->patch('/reserves/'. $reserve->id, [
                'r_date' => null,
                'r_time' => null,
                'r_number' => null,
            ]);

        $this->assertDatabaseHas('reserves', [
            'reserve_number' => 1
        ]);
        $response->assertStatus(302);
    }
}
