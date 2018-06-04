<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $toTruncateTables = [
        'plugs','users','projects'
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->toTruncateTables as $table){
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call(UsersTableSeeder::class);
        $this->call(PlugsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
