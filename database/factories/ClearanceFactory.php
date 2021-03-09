<?php

namespace Database\Factories;

use App\Models\Clearance;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClearanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clearance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'business_type' => "",
            'birthdate' => $this->faker->date('Y-m-d', now()->subYears(18)),
            'birthplace' => $this->faker->address,
            'mobile_number' => +639166801952,
            'personal_address' => $this->faker->address,
            'business_name' => $this->faker->company,
            'business_address' => $this->faker->address,
            'cedula_number' => $this->faker->numberBetween($min = 10000, $max = 99999),
            'completed_at' => now(),
        ];
    }
}
