<?php

namespace Database\Factories;

use App\Models\Maquina;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MaquinaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Maquina::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'modelo' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'marca' => $this->faker->company,
            'operador' => $this->faker->name
        ];
    }
}
