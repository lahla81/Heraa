<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
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
            App\Comment::create([
                'comment'      => $faker->sentence(3,true),
                'user_id'    => App\User::inRandomOrder()->first()->id,
                'plug_id'    => App\Plug::inRandomOrder()->first()->id,
                'project_id'    => App\Project::inRandomOrder()->first()->id,
                'created_at' => \Carbon\Carbon::createFromDate(2018, rand(1, Carbon\Carbon::now()->month),rand(1,28)),
            ]);
        };
    }
}
