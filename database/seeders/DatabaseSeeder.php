<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Media;
use App\Models\Page;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        $user = new User();

        $user->name = "admin";
        $user->email = "ashraf@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make("admin");
        // $user->remember_token =  Str::random(10)::
        $user->save();

        Location::factory( 10 )->create();
        Property::factory( 50 )->create();
        Media::factory( 50 )->create();
    }
}
