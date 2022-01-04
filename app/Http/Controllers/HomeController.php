<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Page;
use App\Models\Property;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller {
    //
    public function home() {

        $latest_properties = Property::latest()->get()->take( 4 );
        $locations         = Location::select( ['id', 'city'] )->get();

        return view( 'welcome', [
            'latest_properties' => $latest_properties,
            'locations'         => $locations,
        ] );
    }

    public function single( $slug ) {
        $page = Page::where( 'slug', $slug )->first();

        if ( !empty( $page ) ) {
            return view( 'page', [
                'page' => $page,
            ] );
        }

        return abort( '404' );

    }

    public function currencyChange( $code ) {
        Cookie::queue( 'currency', $code );
        return back();
    }
}
