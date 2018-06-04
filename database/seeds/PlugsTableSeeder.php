<?php

use Illuminate\Database\Seeder;
class PlugsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<50; $i++){
            App\Plug::create([
                'title'      => $faker->sentence,
                'slug'       => str_random(10),
                'head'       => $faker->paragraph(5),
                'subtitle'   => $faker->sentence,
                'body'       => $faker->sentences(14,true),
                'image'      => $faker->imageUrl($width = 800, $height = 400,'cats', true, 'Faker'),
                'user_id'    => App\User::inRandomOrder()->first()->id,
                'created_at' => \Carbon\Carbon::createFromDate(2018, rand(1, Carbon\Carbon::now()->month),rand(1,28)),
            ]);
        };
    }  //01017999602
    //المنطقة الصناعية / 6 اكتوبر / شركة بابطين مصر
}
