<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'shop_id' => 2,
            'score' => 3.5,
            'comment' => 'お店の雰囲気が自分好みでした。'
        ];
        DB::table('reviews')->insert($param);
    }
}
