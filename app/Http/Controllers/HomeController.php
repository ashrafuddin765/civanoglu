<?php

namespace App\Http\Controllers;

use App\Models\Property;

class HomeController extends Controller {
    //
    public function home() {

        $latest_properties = Property::latest()->get()->take(4);

        return view( 'welcome', [
            'latest_properties' => $latest_properties,
        ]);
    }
}
