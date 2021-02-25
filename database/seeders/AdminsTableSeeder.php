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
        $abette = Admin::create([
            'name' => 'Abetteson Gumasing',
            'email' => 'ahgumasing@gmail.com',
            'password' => Hash::make('password')
        ]);

        $abette->assignRole('superadmin');
    }
}
