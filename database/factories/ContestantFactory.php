<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contestant>
 */
class ContestantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'prize_id' => Prize::query()->randomOrder()->first()->id,
            'slot_no' => $this->faker->integer,
            'is_paid' => 'yes',
            'code_name' => $this->faker->name,
            'real_name' => $this->faker->name,
            'phone_no' => $this->faker->phoneNo,
            'email' => $this->faker->safeEmail,
            'address' =>  => $this->faker->address
        ];
    }
}
