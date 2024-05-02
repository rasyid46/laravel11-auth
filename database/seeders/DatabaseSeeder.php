<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(!User::first()){
            User::create([
                'name' => 'Test User',
                'email' => 'test@user.com',
                'password' => bcrypt('password'), // default password is "password"
            ]);
        }else{
            \Log::info("data already exist");
        }
    }
}
