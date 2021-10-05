<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name(),
            'avatar' => 'https://source.unsplash.com/random',
            'email' => $this->faker->unique()->safeEmail(),
            'cin' => $this->faker->numerify('#######'),
            'phoneNumber' =>$this->faker->phoneNumber(),
            'password' => $this->faker->password()
            
        ];
    }
}
