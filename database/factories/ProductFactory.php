<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'code'=>$this->faker->ean8,
            'name'=>$this->faker->sentence(2),
            'stock'=>100,
            'image'=>'img/imagenes/OIP (1).jpg',
            'price'=>200,
            'purchase_price'=>100,
            'unit'=>'gr',
            'status'=>'ACTIVE',
            'category_id'=>rand(1,10),
        ];
    }
}
