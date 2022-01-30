<?php

namespace Tests\Feature\Middleware;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_login_screen_can_not_be_rendered_by_user_role_5()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_admin_login_screen_can_be_rendered_by_guest(){}
}
