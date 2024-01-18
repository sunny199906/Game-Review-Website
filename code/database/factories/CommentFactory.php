<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{

    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'content' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'comment_date' => $this->faker->dateTime($max = 'now', $timezone = null),
            'rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'reviewer_id' => $this->faker->numberBetween($min = 1, $max = User::count()),
            'game_id' => $this->faker->numberBetween($min = 1, $max = Game::count()),
        ];
    }
}
