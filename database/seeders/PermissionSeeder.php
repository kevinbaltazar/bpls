<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'reviewer', 'guard_name' => 'admin']);
        Role::create(['name' => 'inspector', 'guard_name' => 'admin']);
        Role::create(['name' => 'approver', 'guard_name' => 'admin']);
    }
}
