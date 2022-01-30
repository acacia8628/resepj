<?php

namespace Tests\Feature\UserRole3;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_not_send_email_by_user_role_3_with_users_shop_has_no_reserves()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_not_send_emails_by_user_role_3_with_users_shop_has_no_reserves()
    {
    }

    public function test_can_send_email_to_reserved_user_by_user_role_3()
    {
    }
    public function test_can_send_emails_to_reserved_user_by_user_role_3()
    {
    }
}
