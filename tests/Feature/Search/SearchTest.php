<?php

namespace Tests\Feature\Search;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Shop;

class SearchTest extends TestCase
{
    use DatabaseMigrations;

    public function test_area_can_search_boundary_value()
    {
        $this->seed();
        $area_first = Shop::factory()->create([
            'area_id' => 1,
            'genre_id' => 1,
        ]);

        $area_last = Shop::factory()->create([
            'area_id' => 47,
            'genre_id' => 1,
        ]);

        $result_area_first = Shop::where('id', $area_first->id)->first();
        $this->assertNotNull($result_area_first);
        $this->assertSame($result_area_first->area_id, $area_first->area_id);

        $result_area_last = Shop::where('id', $area_last->id)->first();
        $this->assertNotNull($result_area_last);
        $this->assertSame($result_area_last->area_id, $area_last->area_id);
    }

    public function test_genre_can_search_boundary_value()
    {
        $this->seed();
        $genre_first = Shop::factory()->create([
            'area_id' => 1,
            'genre_id' => 1,
        ]);

        $genre_last = Shop::factory()->create([
            'area_id' => 1,
            'genre_id' => 5,
        ]);

        $result_genre_first = Shop::where('id', $genre_first->id)->first();
        $this->assertNotNull($result_genre_first);
        $this->assertSame($result_genre_first->genre_id, $genre_first->genre_id);

        $result_genre_last = Shop::where('id', $genre_last->id)->first();
        $this->assertNotNull($result_genre_last);
        $this->assertSame($result_genre_last->genre_id, $genre_last->genre_id);
    }

    public function test_search_result_can_be_rendered_with_null()
    {
        $response = $this->get(route('shop.index'));

        $response->assertStatus(200);
    }
}
