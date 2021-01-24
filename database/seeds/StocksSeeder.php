<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $stock = [];
        for ($i = 0; $i < 100; $i++) {
            $j = $i + 1;
            array_push($stock, [
                'product_id' => $j,
                'quantity' => $faker->randomNumber(2),
            ]);
        }
        DB::table('stocks')->insert($stock);
    }
}
