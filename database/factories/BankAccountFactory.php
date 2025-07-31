<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "profile" => "Bank_".fake()->word(),
            "name" => fake()->jobTitle(),
            "address" => fake()->address(),
            "beneficiary" => fake()->word(),
            "account" => fake()->numerify("####-####-####-####"),
            "r_aba" => fake()->numerify("####-####-####-####"),
            "swift" => fake()->numerify("####-####-####-####"),
        ];
    }
}
