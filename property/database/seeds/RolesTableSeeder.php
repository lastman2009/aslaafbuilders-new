<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// for($i= 0; $i<100; $i++)
    	// {

     //    // DB::table('users')->insert([
     //    //     'first_name' => str_random(10),
     //    //     'first_name' => str_random(10),
     //    //     'email' => str_random(10).'@gmail.com',
     //    //     'password' => bcrypt('secret'),
     //    //     'role_id' => 0,
     //    //     'status'=> 1,
     //    //             ]);
     //        DB::table('cities')->insert([
     //        'name' => str_random(10),
     //                ]);
    	// }

        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('towns')->insert([
                'name' => $faker->city,
                'city_id' =>rand(1,10)
            ]);
        }
    }
}

