<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<20; $i++){
            App\User::create([
                'name'           => str_random(10),
                'email'          => str_random(10).'@gmail.com',
                'password'       => bcrypt('secret'),
                'remember_token' => str_random(10),
                'image'          => $faker->imageUrl($width = 200, $height = 200,'cats', true, 'Faker')
            ]);
        };
    }
}
