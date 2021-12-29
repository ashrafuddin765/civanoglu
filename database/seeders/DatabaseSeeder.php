<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Media;
use App\Models\Page;
use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $page          = new Page();
        $page->name    = 'Contact us';
        $page->slug    = 'contact-us';
        $page->content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, nulla?';
        $page->save();
        $page          = new Page();
        $page->name    = 'About us';
        $page->slug    = 'about-us';
        $page->content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, nulla?';
        $page->save();

        Location::factory( 10 )->create();
        Property::factory( 50 )->create();
        Media::factory( 50 )->create();
    }
}
