<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\profile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
            'name' => 'admin',
            'email' =>'admin@admin.com',
            'password' => Hash::make('12345678'),
            'role'=> 'owner'
        ]);
        profile::create([
            'user_id' => $user->id
        ]);
    }
}
