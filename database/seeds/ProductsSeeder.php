<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $product = [];
        for ($i = 0; $i < 100; $i++) {
            array_push($product, [
                'sku' => "$faker->postcode-$faker->countryCode",
                'name' => $faker->name,
                'price' => $faker->randomNumber(2),
            ]);
        }
        DB::table('products')->insert($product);
    }
}
