<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
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
        for($i=0;$i<=4;$i++){
            DB::table('users')->insert([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' =>Hash::make('abc123')
            ]);
        }
    }
}
