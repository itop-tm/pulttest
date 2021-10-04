<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'birth_date' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
            'license_id' => "DMX_" . $this->faker->randomNumber(5),
            'licence_expiry_date' =>  $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        ];
    }
}
