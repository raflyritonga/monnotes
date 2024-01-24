<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'income_description' => fake()->sentence(mt_rand(1, 5)),
            'amount' => fake()->randomNumber(6, true),
            'date_of_income' => date('Y_m_d'),
            'user_id' => 8,
            'category' => fake()->randomElement(['Salary', 'Commission', 'Wage', 'Investment', 'Others', 'Gift'])
        ];
    }
}
