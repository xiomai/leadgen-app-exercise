<?php

namespace AAG\database\seeds;

use Illuminate\Database\Seeder;

class AAGDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultUsersSeeder::class);
    }
}
