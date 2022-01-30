<?php

namespace Tests\Feature\UserRole5;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QrCodeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_qr_code_screen_can_not_be_rendered_by_user_with_reserve_status_is_checked()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_qr_code_screen_can_be_rendered_by_user_with_reserve_status_is_reserved()
    {
    }
}
