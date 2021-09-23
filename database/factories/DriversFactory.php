<?php

namespace Database\Factories;

use App\Models\Drivers;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DriversFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Drivers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'avatar' => 'https://source.unsplash.com/random',
            'name' => $this->faker->name(),
            'phoneNumber' =>$this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'cin' => $this->faker->numerify('#######'),
        ];
    }
}
