<?php

namespace Database\Factories;

use App\Models\Withdrawal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Withdrawal>
 */
class WithdrawalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement([Withdrawal::TYPE_CHECK,Withdrawal::TYPE_WIRE_TRANSFER]);
        return [
            'fee' => $type == Withdrawal::TYPE_WIRE_TRANSFER ? 30 : 0,
            'sum' => fake()->randomFloat(2,1000,50000),
            'payee_name' => fake()->firstName." ".fake()->lastName,
            'address' => fake()->address,
            'city' => fake()->city,
            'state' => fake()->state,
            'zip' => fake()->numerify("#####"),
            'country' => fake()->country(),
            'bank_name' => $type == Withdrawal::TYPE_WIRE_TRANSFER ? fake()->company() : '',
            'bank_address' => $type == Withdrawal::TYPE_WIRE_TRANSFER ? fake()->address() : '',
            'bank_account' => $type == Withdrawal::TYPE_WIRE_TRANSFER ? fake()->numerify("####-####-####-####") : '',
            'bank_aba' => $type == Withdrawal::TYPE_WIRE_TRANSFER ? fake()->word() : '',
            'status' => fake()->randomElement([Withdrawal::STATUS_PAYED,Withdrawal::STATUS_PENDING,Withdrawal::STATUS_CANCEL]),
            'type' => $type,
            'created_at' => fake()->dateTimeBetween('-1 years'),
            'payed_at' => fake()->dateTimeBetween('-1 years'),
        ];
    }
}
