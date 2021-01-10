<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business_type;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business_type::create(['type' => 'gg']);
    }
}
