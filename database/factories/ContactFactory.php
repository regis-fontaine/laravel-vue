<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'receiver' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'isActivate' => $this->faker->boolean(),
            'interval' => $this->faker->randomElement(['1m', '5m', '10m']),
            'user_id' => User::all()->random()->id
        ];
    }
}
