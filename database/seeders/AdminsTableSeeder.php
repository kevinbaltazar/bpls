<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kevin = Admin::create([
            'name' => 'Kevin Baltazar',
            'email' => 'kevinngakasi27@gmail.com',
            'password' => Hash::make('password')
        ]);

        $kevin->assignRole('superadmin');
    }
}
