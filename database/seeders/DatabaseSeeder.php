<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreasTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(ShopsTableSeeder::class);

        /**
         * 下記のシーダーはユーザーがいない場合エラーが出るため、通常はコメントアウト。
         * 使う場合はユーザー登録をした後に、上記３つのシーダーをコメントアウトしてから使う。
        */

        /* $this->call(ReviewsTableSeeder::class); */
        /* $this->call(ReservesTableSeeder::class); */
    }
}
