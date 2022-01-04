<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'name'        => $this->faker->image( 'public/storage/uploads', 1200, 800, null, false ),
            'property_id' => Property::all()->random()->id,

        ];
    }
}
