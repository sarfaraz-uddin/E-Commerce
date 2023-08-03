<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deal;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


// Generate a fake width and height using Faker
$width = 640;
$height = 480;

class DealSeeder extends Seeder
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
        DB::table('deals')->insert([
            'dealTitle' =>$faker->word,
            'dealDescription' =>$faker->sentence,
            'dealPrice' =>12.33,
            'dealBackgroundImage'=>$faker->imageUrl(640,480),
            'endDate' => $faker->dateTimeBetween('-30 days', '+30 days'),
            'product_id'=>3,
        ]);
    }
}
