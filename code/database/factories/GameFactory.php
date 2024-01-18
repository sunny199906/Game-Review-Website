<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{

    protected $model = Game::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'game_name' => $this->faker->domainWord, 
            'rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'publish_date' => $this->faker->dateTime($max = 'now', $timezone = null),
            'game_provider_id' => $this->faker->numberBetween($min = 1, $max = User::count()),
        ];
    }
}
