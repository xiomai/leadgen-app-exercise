<?php

namespace AAG\database\seeds;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $initialUsers = [
            [
                'name' => 'Alison Galeon',
                'email' => 'galeonalison@gmail.com'
            ],
            // [
            //     'name' => 'test@mail.com',
            //     'email' => 'test@gmail.com'
            // ],
        ];

        foreach ($initialUsers as $user) {
            User::create([
                'name'       => $user['name'],
                'email'      => $user['email'],
                'password'   => bcrypt($user['email']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
