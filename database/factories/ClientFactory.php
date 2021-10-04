<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

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
