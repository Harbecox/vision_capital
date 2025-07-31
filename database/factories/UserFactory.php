<?php

namespace Database\Factories;

use App\Models\BankAccount;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
        $type = fake()->randomElement(['Personal', 'Joint', 'Business']);
        $birthDay = fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d');
        $date = fake()->dateTimeBetween('-1 years');
        $zip = fake()->numberBetween(123,5489);
        $bank_id = fake()->boolean ? BankAccount::all()->random(1)->first()->id : null;
        return [
            'type' => $type,
            'first_name' => fake()->firstName,
            'middle_name' => fake()->lastName,
            'last_name' => fake()->lastName,
            'birth_day' => $birthDay,
            'ss_dl' => fake()->numerify('#########'),
            'address' => fake()->address,
            'zip' => $zip,
            'city' => fake()->city,
            'state' => fake()->state,
            'country' => fake()->country,
            'phone' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
            'account' => fake()->unique()->numberBetween(100000,999999),
            'password' => 'password',
            'secret_question' => fake()->randomElement([
                'In which city did you first see the ocean?',
                'What was the name of your childhood pet?',
                'In which city was your father born?',
                'What is your favorite childhood dish?',
                'In which country did you spend your first vacation?',
            ]),
            'secret_answer' => fake()->word,
            'username' => fake()->unique()->userName,
            'created_at' => $date,
            'email_verified_at' => Carbon::now(),
            'bank_id' => $bank_id,
            'bank' => !is_null($bank_id),
            'check' => fake()->boolean,
            "approved" => true
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
