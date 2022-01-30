<?php

namespace Tests\Feature\UserRole1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_register_shop_by_user_role_1()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
