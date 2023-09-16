<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'animal_type' => $this->faker->animal_type,
            'breed' => $this->faker->breed,
            'is_mixed' => $this->faker->is_mixed,
            'animal_age' => $this->faker->animal_age,
            'phone_number' => $this->faker->phone_number,
            'customer_surname' => $this->faker->customer_surname,
            'email' => $this->faker->email,
            'is_shared' => false,
        ];
    }
}
