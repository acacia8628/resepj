<?php

namespace Tests\Feature\UserRole3;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Mail\SendIndividualToCustomer;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;

class MailTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_not_send_email_with_shop_has_no_reserves()
    {
        $shop = Shop::factory()->create([
            'user_id' => User::factory()->create([
                'role' => 3
            ])
        ]);

        Mail::fake();

        $response = $this->actingAs($shop->user)
            ->post('/manager/mail', [
                'shop_id' => $shop->id,
                'reserve_id' => 1
            ]);

        Mail::assertNothingSent();
    }

    public function test_can_not_send_emails_with_shop_has_no_reserves()
    {
        $shop = Shop::factory()->create([
            'user_id' => User::factory()->create([
                'role' => 3
            ])
        ]);

        Mail::fake();

        $response = $this->actingAs($shop->user)
            ->post('/manager/mails', ['shop_id' => $shop->id]);

        Mail::assertNothingSent();
    }

    public function test_can_send_email_to_reserved_by_role_3()
    {
        $shop = Shop::factory()->create([
            'user_id' => User::factory()->create([
                'role' => 3
            ])
        ]);
        $reserve = Reserve::factory()->create([
            'user_id' => User::factory()->create([
                'role' => 5
            ]),
            'shop_id' => $shop->id
        ]);

        Mail::fake();

        $response = $this->actingAs($shop->user)
            ->post('/manager/mail', [
                'shop_id' => $shop->id,
                'reserve_id' => $reserve->id,
        ]);

        Mail::assertSent(SendIndividualToCustomer::class);
    }
    public function test_can_send_emails_to_reserved_by_role_3()
    {
        $shop = Shop::factory()->create([
            'user_id' => User::factory()->create([
                'role' => 3
            ])
        ]);
        $reserve = Reserve::factory()->create([
            'user_id' => User::factory()->create([
                'role' => 5
            ]),
            'shop_id' => $shop->id
        ]);

        Mail::fake();

        $response = $this->actingAs($shop->user)
            ->post('/manager/mails', [
                'shop_id' => $shop->id,
            ]);

        Mail::assertSent(SendIndividualToCustomer::class);
    }
}
