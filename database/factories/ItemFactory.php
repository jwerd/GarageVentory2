<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = [
            'Red Dresser',
            'Blue Dresser',
            'Red Hutch',
            'Black Hutch',
            'Tallboy',
        ];
        return [
            'name' => $this->faker->randomElement($names),
            'price' => $this->faker->randomFloat(1,100),
            'dimension' => [
                'width' => 50,
                'height' => 50,
                'length' => 50,
            ],
            'account_id' => 1,
        ];
    }
}
