<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 500) as $index) {
            DB::table('students')->insert([
                'fullname' => $faker->firstname,
                'username' => $faker->username,
                'password' => $faker->password,
                'address' => $faker->address,
                'email' => $faker->email,
                'country' => $faker->country,
                'p_num' => $faker->phoneNumber,
                'c_id' => $index,
                'dob' => $faker->date($format = 'y-m-d', $max = '2010', $min = '1980')
            ]);
        }
    }
}