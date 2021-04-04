<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(1)->create(['name'=>'farshid',
        'email'=>'farshidjahanmanesh@gmail.com',
        'password'=> Hash::make('Fa123456'),
        'role'=>'BaseAdmin']);
    }
}
