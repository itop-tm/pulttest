<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand'         => 'BMW',
            'model'         => $this->faker->randomElement(['BMX X5', 'BMX X6']),
            'state_number'  => "RUS_" . $this->faker->randomNumber(5),
            'color'         => 'white',
            'year_of_issue' => '2016'
        ];
    }
}
