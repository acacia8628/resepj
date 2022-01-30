<?php

namespace Tests\Feature\UserRole3;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopDetailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_update_shop_detail_by_user_role_3()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
