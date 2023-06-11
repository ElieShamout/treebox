<?php

namespace Database\Factories;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Balance>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sender_id'   => Balance::inRandomOrder()->first(),
            'future_name'   => $this->faker->name(),
            'future_phone'   => $this->faker->phoneNumber(),
            'future_email'   => $this->faker->email(),
            'future_address'   => $this->faker->address(),
            'cost'        => 150,
            'weight'      => 150,
            'width'       => 150,
            'height'      => 150,
            'thickness'   => 150,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
