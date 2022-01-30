<?php

namespace Tests\Feature\UserRole5;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReserveTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_add_reserve_by_user_role_5()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_reserve_can_not_be_rendered_with_null()
    {}

    public function test_can_delete_reserve_by_user_role_5(){}

    public function test_can_update_reserve_by_user_role_5(){}

    public function test_reserve_edit_can_be_rendered_by_reserved_user(){}

    public function test_reserve_edit_can_not_be_rendered_with_null(){}
}
