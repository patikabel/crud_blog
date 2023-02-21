<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'role'     => 'Administrator',
            'password'  => Hash::make('admin')
        ]);

        User::create([
            'name'      => 'Riski Amelia',
            'email'     => 'riski@gmail.com',
            'password'  => bcrypt('secret'),
            'role'      => 'operator'
        ]);
        // User::create([
        //     'name'      => 'User',
        //     'email'     => 'user@gmail.com',
        //     'role'     => 'User',
        //     'password'  => Hash::make('admin')
        // ]);
    }
}
