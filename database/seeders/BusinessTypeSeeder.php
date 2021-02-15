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
        Business_type::create(['name' => 'Resort']);
        Business_type::create(['name' => 'Babuyan (piggery)']);
        Business_type::create(['name' => 'Manukan (Hatchery/Layer/Cock Fight)']);
        Business_type::create(['name' => 'Poultry/Feed Supply']);
        Business_type::create(['name' => 'Cemetery proprietor']);
        Business_type::create(['name' => 'Dress Shop/Tailoring']);
        Business_type::create(['name' => 'Out Lumber Dealer']);
        Business_type::create(['name' => 'Wood Craft Merchandise']);
        Business_type::create(['name' => 'Computer Shop']);
        Business_type::create(['name' => 'Construction Firm']);
        Business_type::create(['name' => 'Kooperatiba']);
        Business_type::create(['name' => 'School Establishment Private']);
        Business_type::create(['name' => 'School Services']);
        Business_type::create(['name' => 'Bakery']);
        Business_type::create(['name' => 'Eatery']);
        Business_type::create(['name' => 'Food stand']);
        Business_type::create(['name' => 'Rice Dealer']);
        Business_type::create(['name' => 'Water Refilling station']);
        Business_type::create(['name' => 'Clinic']);
        Business_type::create(['name' => 'Pharmacy']);
        Business_type::create(['name' => 'Aluminum/Steel/Glass Supply']);
        Business_type::create(['name' => 'Gawaan ng plastic']);
        Business_type::create(['name' => 'Gomahan']);
        Business_type::create(['name' => 'Par Concrete']);
        Business_type::create(['name' => 'Pyrotechnic Manufacturer']);
        Business_type::create(['name' => 'Pyrotechnic Dealer']);
        Business_type::create(['name' => 'Studio/Photography']);
        Business_type::create(['name' => 'Sanglaan']);
        Business_type::create(['name' => 'Barber Shop']);
        Business_type::create(['name' => 'Parlor']);
        Business_type::create(['name' => 'Commercial space']);
        Business_type::create(['name' => 'Paupahan (Apartment)']);
        Business_type::create(['name' => 'Auto Supply']);
        Business_type::create(['name' => 'Car/Air/Repair Shop']);
        Business_type::create(['name' => 'Car Wash']);
        Business_type::create(['name' => 'Motor Shop']);
        Business_type::create(['name' => 'Gasoline station']);
        Business_type::create(['name' => 'General Merchandise']);
        Business_type::create(['name' => 'Hardware Supplies']);
        Business_type::create(['name' => 'Rice dealer']);
        Business_type::create(['name' => 'Sari-Sari store']);
        Business_type::create(['name' => 'Transport services']);
        Business_type::create(['name' => 'Travel and Tours']);
        Business_type::create(['name' => 'Trucking Services']);
        Business_type::create(['name' => 'Junkshop']);
    }
}
