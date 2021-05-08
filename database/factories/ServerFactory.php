<?php

namespace Database\Factories;

use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Server::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'region' => $this->faker->randomElement(['US', 'EU']),
            'name' => $this->faker->unique()->randomElement(['Aegwynn', 'Aerie Peak','Agamaggan', 'Uldaman','Arthas', 'Boulderfist','Dentarg', 'Drak\'thul','Exodar', 'Goldrinn']),
        ];
    }
}
