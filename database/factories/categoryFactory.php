<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\book;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class categoryFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
        ];
        

              
            
       
    }
    // public function category()
    // {
    //     return [
    //         'name' => $this->faker->word,
    //         'description' => $this->faker->sentence,
    //         'image' => $this->faker->imageUrl(),
    //     ];
    // }
    // public function book()
    // {
    //     return [
    //         'name' => $this->faker->sentence,
    //         'description' => $this->faker->paragraph,
    //         'number' => $this->faker->randomNumber(),
    //         'price' => $this->faker->randomFloat(2, 10, 100),
    //         'language' => $this->faker->languageCode,
    //         'writer' => $this->faker->name,
    //         'image' => $this->faker->imageUrl(),
    //         'type' => $this->faker->randomElement(['buy', 'sell']),
    //         'user_id' => $this->faker->numberBetween(1, 10), // Assuming you have 10 users
    //         'category_id' => $this->faker->numberBetween(1, 10), // Assuming you have 10 categories
    //     ];
    // }
    // /**
    //  * Indicate that the model's email address should be unverified.
    //  */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
