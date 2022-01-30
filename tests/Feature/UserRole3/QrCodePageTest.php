<?php

namespace Tests\Feature\UserRole3;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QrCodePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_qr_screen_can_not_be_rendered_by_user_role_3_with_reserve_status_is_checked()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_qr_screen_can_be_rendered_by_user_role_3_with_reserve_status_is_reserved()
    {
    }

    public function test_reserve_status_is_reserved_to_checked_after_qr_screen_rendered()
    {
    }
}
