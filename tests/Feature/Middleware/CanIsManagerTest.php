<?php

namespace Tests\Feature\Middleware;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CanIsManagerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_manager_index_screen_can_be_rendered_by_user_role_3()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_manager_index_screen_can_not_be_rendered_by_guest(){}

    public function test_manager_index_screen_can_not_be_rendered_by_user_role_5(){}
}
