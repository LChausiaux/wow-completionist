<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'server_id' => $this->faker->numberBetween(1, 10),
            'username' => ucfirst(preg_replace('/[0-9]|\./', '', $this->faker->userName)),
            'faction' => $this->faker->randomElement(['alliance', 'horde']),
            'achievement_points' => $this->faker->numberBetween(1000, 20000),
            'guild' => $this->faker->company,
            'class' => $this->faker->randomElement([
                'Paladin',
                'Warrior',
                'Hunter',
                'Rogue',
                'Priest',
                'Shaman',
                'Mage',
                'Druid',
                'Monk',
                'Warlock',
                'Death Knight',
                'Demon Hunter',
            ]),
            'avatar' => 'https://render-eu.worldofwarcraft.com/character/uldaman/86/112763222-avatar.jpg',
        ];
    }
}
