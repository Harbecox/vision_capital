<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\User;
use App\Models\UserBalance;
use App\Models\UserInfo;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = fake()->randomElement(['Personal', 'Joint', 'Business']);
        $bank_id = fake()->boolean ? BankAccount::all()->random(1)->first()->id : null;

        $u = new User();

        $u->type = $type;
        $u->password = 'password';
        $u->secret_question = fake()->randomElement([
            'In which city did you first see the ocean?',
            'What was the name of your childhood pet?',
            'In which city was your father born?',
            'What is your favorite childhood dish?',
            'In which country did you spend your first vacation?',
        ]);
        $u->secret_answer = fake()->word;
        $u->username = "user";
        $u->account = fake()->unique()->numberBetween(100000,999999);
        $u->bank_id = $bank_id;
        $u->bank = !is_null($bank_id);
        $u->check = fake()->boolean;
        $u->div_comp = true;
        $u->approved = true;
        $u->email = fake()->unique()->safeEmail;
        $u->created_at = fake()->dateTimeBetween('-1 years');


        $u->save();

        $user_info = new UserInfo();
        $user_info->user_id = $u->id;
        $user_info->first_name = fake()->firstName;
        $user_info->middle_name = fake()->lastName;
        $user_info->last_name = fake()->lastName;
        $user_info->birth_day =  fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d');
        $user_info->ss_dl = fake()->numerify('#########');
        $user_info->address = fake()->address;
        $user_info->zip = fake()->numberBetween(123,5489);
        $user_info->city = fake()->city;
        $user_info->state = fake()->state;
        $user_info->country = fake()->country;
        $user_info->phone = fake()->phoneNumber;
        $user_info->email = fake()->unique()->safeEmail;
        $user_info->created_at = fake()->dateTimeBetween('-1 years');

        $user_info->save();

        $u->deposites()->create([
            "sum" => rand(5,10)*1000,
            "type" => fake()->randomElement(['wire_transfer', 'check']),
            "status" => Deposit::STATUS_PAYED,
            "payed_at" => Carbon::now()->subMonths()->endOfMonth()->subDays(rand(3,10) + 90)
        ]);

        $u->deposites()->create([
            "sum" => rand(5,10)*1000,
            "type" => fake()->randomElement(['wire_transfer', 'check']),
            "status" => Deposit::STATUS_PAYED,
            "payed_at" => Carbon::now()->subDays(92)
        ]);

        $u->deposites()->create([
            "sum" => rand(5,10)*1000,
            "type" => fake()->randomElement(['wire_transfer', 'check']),
            "status" => Deposit::STATUS_PAYED,
            "payed_at" => Carbon::now()->subMonths()->endOfMonth()->addDays(rand(5,15))
        ]);

        $u->deposites()->create([
            "sum" => rand(5,10)*1000,
            "type" => fake()->randomElement(['wire_transfer', 'check']),
            "status" => Deposit::STATUS_PAYED,
            "payed_at" => Carbon::now()->subMonths()->startOfMonth()->addDays(rand(5,15))
        ]);

        $u->deposites()->create([
            "sum" => rand(5,10)*1000,
            "type" => fake()->randomElement(['wire_transfer', 'check']),
            "status" => Deposit::STATUS_PAYED,
            "payed_at" => Carbon::now()->subMonths()->startOfMonth()->addDays(rand(5,15))
        ]);

        $u->deposites()->create([
            "sum" => rand(5,10)*1000,
            "type" => fake()->randomElement(['wire_transfer', 'check']),
            "status" => Deposit::STATUS_PAYED,
            "payed_at" => Carbon::now()->subDays(3)
        ]);

        Withdrawal::factory(1)->create([
            "payed_at" => Carbon::now()->subDays(15),
            "user_id" => $u->id,
            "sum" => 5000,
            "status" => Withdrawal::STATUS_PAYED,
        ]);

        Withdrawal::factory(1)->create([
            "payed_at" => Carbon::now()->subDays(3),
            "user_id" => $u->id,
            "sum" => 3000,
            "status" => Withdrawal::STATUS_PAYED,
        ]);

    }
}
