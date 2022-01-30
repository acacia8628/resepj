<?php

namespace Tests\Feature\Search;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_area_result_can_be_rendered_with_boundary_value()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_search_genre_result_can_be_rendered_with_boundary_value()
    {
    }

    public function test_search_name_result_can_be_rendered_with_null()
    {
    }
}
