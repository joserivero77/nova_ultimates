<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name'=>$this->faker->sentence(2),
            'email'=>$this->faker->email,
            'rif'=>$this->faker->randomNumber(2),
            'address'=>$this->faker->streetAddress,
            'phone'=>$this->faker->phoneNumber,


        ];
    }
}
