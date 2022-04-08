<?php

namespace Database\Factories;
use App\Models\Cities;
use App\Models\GasStations;
use Illuminate\Database\Eloquent\Factories\Factory;
class GasStationsFactory extends Factory
{
    protected $model = GasStations::class;
    public function definition()
    {
        return [
            'cidade_id' => Cities::all()->random()->id,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'reservatorio' => $this->faker->randomFloat(2, 0, 100),
        ];
    }

}
