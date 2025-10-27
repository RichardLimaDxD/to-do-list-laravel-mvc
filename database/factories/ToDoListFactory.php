<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToDoListFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence() ?? 'Untitled',
            'description' => fake()->paragraph() ?? null,
            'status' => fake()->randomElement(['pending', 'completed']) ?? 'pending',
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
