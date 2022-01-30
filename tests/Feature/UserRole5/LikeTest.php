<?php

namespace Tests\Feature\UserRole5;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_not_like_again_by_liked_user()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function test_can_like_by_user_role_5(){}

    public function test_can_unlike_by_user_role_5(){}
}
