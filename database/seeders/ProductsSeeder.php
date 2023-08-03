<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        for($i = 0; $i < 10; $i++){
        DB::table('products')->insert([
            'name' => $faker->name,
            'price'=> $faker->randomNumber(2),
            'photo' => $faker->imageUrl(640, 480, 'fashion'),
            // 'brand'=> $faker->company,
            'color'=> $faker->colorName,
            'size'=>$faker->randomElement(['S','M','L','XL','XXL']),
            'quantity'=>$faker->randomNumber(2),
            'choices'=>$faker->randomElement(['1','2']),
            'categoryid'=>$faker->randomElement(['1','2','3','4','5','6','7']),
            'brandId'=>$faker->randomElement(['1','2','3','4','5','6'])
        ]);
    }
    }
}
