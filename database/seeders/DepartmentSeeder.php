<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentSeeder extends Seeder
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
        // $categories = ['Electronics', 'Clothing', 'Mobiles', 'Shoes','Bags','Hats','Books','Music'];
        $departments=['Fashion','Electronics','Beauty & Personal Care','Home & Kitchen','Sports & Outdoors','Books & Stationary','Toys & Games','Health & Wellness','Baby & Kids','Automotive'];
        for ($i=0; $i <= 7; $i++) {
            DB::table('departments')->insert([
                'departmentName' => $faker->unique()->randomElement($departments),
                'departmentImage' => $faker->imageUrl(640, 480, 'fashion'),
            ]);
        }
    }
}
