<?php

namespace Database\Factories;

use App\Models\Admin\Sale;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(0, 10),
            'month'=> $this->faker->numberBetween(1, 12),
            'year'=> $this->faker->numberBetween(2017, 2022),
            'sold_quantity' => $this->faker->numberBetween(300, 3000),
            'money' => $this->faker->numberBetween(10000, 2000000),
        ];
    }
}
