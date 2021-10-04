<?php

namespace Database\Factories;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Factories\Factory;

class TariffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tariff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                      => $this->faker->randomElement(['Tariff 1', 'Tariff 2']),
            'minimal_cost'              => 100,
            'cost_per_km'               => $this->faker->numberBetween(1, 10),
            'cost_per_minute'           => $this->faker->numberBetween(1, 10),
            'number_of_free_kilometers' => $this->faker->numberBetween(1, 5),
            'number_of_free_minutes'    => $this->faker->numberBetween(1, 10),
        ];
    }
}
