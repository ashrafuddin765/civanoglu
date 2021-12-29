<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;

class HomeController extends Controller {
    //
    public function home() {

        $latest_properties = Property::latest()->get()->take( 4 );
        $locations         = Location::select( ['id', 'city '] )->get();

        return view( 'welcome', [
            'latest_properties' => $latest_properties,
            'locations'         => $locations,
        ] );
    }
}
