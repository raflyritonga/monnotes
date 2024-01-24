<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $expenseCategories = [
            'Housing',
            'Transportation',
            'Food',
            'Utilities',
            'Insurance',
            'Medical & Healthcare',
            'Saving, Investing, & Debt Payments',
            'Personal Spending',
            'Recreation & Entertainment',
            'Others'
        ];
        
        return [
            'expense_description' => fake()->sentence(mt_rand(1, 5)),
            'amount' => fake()->randomNumber(6, true),
            'date_of_expense' => date('Y_m_d'),
            'user_id' => 8,
            'category' => fake()->randomElement($expenseCategories)
        ];
    }
}
