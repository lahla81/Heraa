<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
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
            App\Project::create([
                'title'      => $faker->sentence,
                'excerpt'    => $faker-> paragraph(4),
                'category'   => str_random(8),
                'description'=> $faker->sentences(14,true),
                'image'      => $faker->imageUrl($width = 800, $height = 400, true, 'Faker'),
                'user_id'    => App\User::inRandomOrder()->first()->id,
                'created_at' => \Carbon\Carbon::createFromDate(2018, rand(1, Carbon\Carbon::now()->month),rand(1,28)),
            ]);
        };
    }
}
