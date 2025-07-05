<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public function definition()
    {
        return [
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'phone' => $this->faker->phoneNumber,
        'address' => $this->faker->address,
        'birthdate' => $this->faker->date(),
        'worker_category' => $this->faker->word(),
        'ministry_group' => $this->faker->word(),
        'join_date' => $this->faker->date(),
        'status' => $this->faker->randomElement(['Active', 'Inactive']),
    ];
    }
}
