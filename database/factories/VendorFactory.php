<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'=>$this->faker->name,
            'email'=>$this->faker->unique()->safeEmail,
            'password'=>Hash::make('password'),
            'phone'=>$this->faker->phoneNumber,
            'store_id'=>$this->faker->unique()->numberBetween(1,5),
        ];
    }
}
