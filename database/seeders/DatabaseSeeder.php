<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Media;
use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Location::factory(10)->create();
        Property::factory(50)->create();
        Media::factory(50)->create();
    }
}
