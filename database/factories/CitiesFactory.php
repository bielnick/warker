<?php

namespace Database\Factories;

use App\Models\Cities;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitiesFactory extends Factory
{
    protected $model = Cities::class;
    public function definition()
    {
        return [
            'nome_da_cidade' => $this->faker->city,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }

}
