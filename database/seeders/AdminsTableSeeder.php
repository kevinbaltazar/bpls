<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Kevin Baltazar',
            'email' => 'kevinngakasi27@gmail.com',
            'password' => Hash::make('password')
        ]);

        Admin::create([
            'name' => 'Abette Gumasing',
            'email' => 'ahgumasing@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
