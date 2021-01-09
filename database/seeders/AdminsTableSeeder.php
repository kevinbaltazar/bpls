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

        $abette = Admin::create([
            'name' => 'Abette Gumasing',
            'email' => 'ahgumasing@gmail.com',
            'password' => Hash::make('password')
        ]);

        $abette->assignRole('superadmin');

        $reviewer = Admin::create([
            'name' => 'Juan Dela Cruz',
            'email' => 'reviewer@bpls.site',
            'password' => Hash::make('password')
        ]);

        $reviewer->assignRole('reviewer');

        $inspector = Admin::create([
            'name' => 'Iska',
            'email' => 'inspector@bpls.site',
            'password' => Hash::make('password')
        ]);

        $inspector->assignRole('inspector');

        $approver = Admin::create([
            'name' => 'Isko',
            'email' => 'approver@bpls.site',
            'password' => Hash::make('password')
        ]);

        $approver->assignRole('approver');

        $dispatcher = Admin::create([
            'name' => 'Juan',
            'email' => 'dispatcher@bpls.site',
            'password' => Hash::make('password')
        ]);

        $dispatcher->assignRole('dispatcher');
    }
}
