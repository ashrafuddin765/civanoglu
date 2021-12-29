<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request as HttpRequest;

class PropertyController extends Controller {

    public function single( $id ) {

        $property  = Property::findOrFail( $id );

        return view( 'property.single', [
            'property'  => $property,

        ] );
    }

    public function index( HttpRequest $request ) {

        $latest_properties = Property::latest();

        if ( '' != $request->type ) {
            $latest_properties = $latest_properties->where( 'type', (int) $request->type );
        }

        if ( '' != $request->sale ) {
            $latest_properties = $latest_properties->where( 'sale', $request->sale );
        }

        if ( !empty( $request->bedrooms ) ) {
            $latest_properties = $latest_properties->where( 'bedrooms', $request->bedrooms );
        }
        if ( !empty( $request->location ) ) {
            $latest_properties = $latest_properties->where( 'location_id', $request->location );
        }

        if ( !empty( $request->search ) ) {
            $latest_properties = $latest_properties->where( 'name', 'like', "%{$request->search}%" );

        }

        if ( !empty( $request->price ) ) {
            switch ( $request->price ) {
            case '100000':
                $latest_properties = $latest_properties->where( 'price', '<', 100000 );
                break;
            case '200000':
                $latest_properties = $latest_properties->where( 'price', '>=', 100000 )->where( 'price', '<=', 200000 );
                break;
            case '300000':
                $latest_properties = $latest_properties->where( 'price', '>=', 200000 )->where( 'price', '<=', 300000 );
                break;
            case '400000':
                $latest_properties = $latest_properties->where( 'price', '>=', 300000 )->where( 'price', '<=', 400000 );
                break;
            case '500000':
                $latest_properties = $latest_properties->where( 'price', '>=', 400000 )->where( 'price', '<=', 500000 );
                break;

            }

        }

        $locations         = Location::select( ['id', 'city'] )->get();
        $latest_properties = $latest_properties->paginate( 12 );
        return view( 'property.index ', [
            'latest_properties' => $latest_properties,
            'locations'         => $locations,
        ] );
    }

}
