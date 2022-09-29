<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use App\Models\Testing;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testing>
 */
class TestingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Testing::class;

    public function definition()
    {
        return [
                'name'      => $this->faker->name(),
                'address'   => $this->faker->city(),
                'dob'       => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'movies'    => '["FF","GG","HH","II"]',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
        ];
    }
}
