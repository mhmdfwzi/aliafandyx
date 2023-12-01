<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(2,true);
        return [
            //
            'name'=>$name,
            'slug'=>Str::slug($name),
            // 'category_id'=>Category::inRandomOrder()->first()->id,
            'description'=>$this->faker->sentence(15),
            'logo_image'=>$this->faker->imageUrl,
            'cover_image'=>$this->faker->imageUrl,
        ];
    }
}
