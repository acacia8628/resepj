<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservesTableSeeder extends Seeder
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
            'shop_id' => 1,
            'reserve_date' => '2020-01-01',
            'reserve_time' => '18:00:00',
            'reserve_number' => 3,
        ];
        DB::table('reserves')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 2,
            'reserve_date' => '2020-02-01',
            'reserve_time' => '19:00:00',
            'reserve_number' => 2,
        ];
        DB::table('reserves')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 3,
            'reserve_date' => '2020-03-01',
            'reserve_time' => '20:00:00',
            'reserve_number' => 1,
        ];
        DB::table('reserves')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 3,
            'reserve_date' => '2020-04-01',
            'reserve_time' => '18:00:00',
            'reserve_number' => 6,
        ];
        DB::table('reserves')->insert($param);
    }
}
