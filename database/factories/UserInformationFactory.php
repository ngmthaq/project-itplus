<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserInformation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'dob' => $this->faker->date(),
            'is_male' => $this->faker->boolean(),
            'address' => $this->faker->address()
        ];
    }
}
