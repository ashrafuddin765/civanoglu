<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Media;
use App\Models\Property;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller {
    //
    public function index() {
        return view( 'admin.dashboard' );
    }

    public function properties() {
        $properties = Property::latest()->paginate();

        return view( 'admin.property.index', [
            'properties' => $properties,
        ] );
    }

    public function editProperty( $propety_id ) {

        $property  = Property::findOrFail( $propety_id );
        $locations = Location::all();
        return view( 'admin.property.edit', [
            'property'  => $property,
            'locations' => $locations,
        ] );

    }

    public function addProperty() {

        $locations = Location::all();
        return view( 'admin.property.add', [
            'locations' => $locations,
        ] );

    }

    public function validateProperty() {
        return [
            'name'           => 'required',
            'name_tr'        => 'required',
            'featured_image' => 'required|image',
            'gallery_image'  => 'required',
            'location_id'    => 'required',
            'price'          => 'required|integer',
            'sale'           => 'integer',
            'type'           => 'integer',
            'bathrooms'      => 'integer',
            'drawing_rooms'  => 'integer',
            'net_sqm'        => 'integer',
            'pool'           => 'integer',
            'overview'       => 'required',
            'overview_tr'    => 'required',
            'description'    => 'required',
            'description_tr' => 'required',
        ];
    }

    public function createProperty( Request $request ) {

        $request->validate( $this->validateProperty() );

        $property = new Property();

        $this->saveOrUpdateProperty( $property, $request );

        return redirect( route( 'dash-properties' ) )->with( ['message' => 'Property added!'] );
    }

    public function saveOrUpdateProperty( $property, $request ) {
        $property->name    = $request->name;
        $property->name_tr = $request->name_tr;

        if ( $request->featured_image ) {
            $featured_image_name = time() . '-' . $request->featured_image->getClientOriginalName();
            $request->featured_image->storeAs( 'public/uploads', $featured_image_name );
            $property->featured_image = $featured_image_name;
        }
        $property->location_id = $request->location_id;

        $property->price         = $request->price;
        $property->sale          = $request->sale;
        $property->type          = $request->type;
        $property->bedrooms      = $request->bedrooms;
        $property->drawing_rooms = $request->drawing_rooms;
        $property->bathrooms     = $request->bathrooms;
        $property->net_sqm       = $request->net_sqm;
        $property->pool          = $request->pool;

        $property->why_buy        = $request->why_buy;
        $property->why_buy_tr     = $request->why_buy_tr;
        $property->overview       = $request->overview;
        $property->overview_tr    = $request->overview_tr;
        $property->description    = $request->description;
        $property->description_tr = $request->description_tr;

        $property->save();

        if ( $request->gallery_image ) {

            foreach ( $request->gallery_image as $gallery_image ) {
                $gallery = new Media();

                $gallery_image_name = time() . '-' . $gallery_image->getClientOriginalName();
                $gallery_image->storeAs( 'public/uploads', $gallery_image_name );
                $gallery->name        = $gallery_image_name;
                $gallery->property_id = $property->id;
                $gallery->save();
            }
        }

    }

    function deleteMedia( $media_id ) {
        $media = Media::findOrFail( $media_id );
        //delete the file
        Storage::delete( 'public/uploads/' . $media->name );

        $media->delete();

        return back();
    }

    public function updateProperty( $id, Request $request ) {
        $property                             = Property::findOrFail( $id );
        $updated_validation                   = $this->validateProperty();
        $updated_validation['featured_image'] = 'image';
        $updated_validation['gallery_image']  = '';
        $request->validate( $updated_validation );

        $this->saveOrUpdateProperty( $property, $request );

        return redirect( route( 'dash-properties' ) )->with( ['message' => 'Property updated!'] );

    }

    public function deleteProperty( $id ) {

        $property = Property::findOrFail( $id );
        Storage::delete( 'public/uploads/' . $property->featured_image );
        if ( $property->gallery ) {
            foreach ( $property->gallery as $gallery_image ) {
                $media = new Media();
                $media = Media::findOrFail( $gallery_image->id );
                Storage::delete( 'public/uploads/' . $gallery_image->name );
                $media->delete();
            }
        }

        $property->delete();

        return redirect( route( 'dash-properties' ) )->with( ['message' => 'Property deleted!'] );

    }

    // Location Start
    public function locations() {
        $locations = Location::latest()->paginate();

        return view( 'admin.location.index', [
            'locations' => $locations,
        ] );
    }
    public function editLocation( $id ) {

        $location = Location::findOrFail( $id );

        return view( 'admin.location.edit', [
            'location' => $location,
        ] );

    }

    public function addLocation() {

        return view( 'admin.location.add' );

    }

    public function createLocation( Request $request ) {

        $request->validate( [
            'name' => 'required',
            'city' => 'required',
        ] );

        $location = new Location();

        $location->name = $request->name;
        $location->city = $request->city;

        $location->save();

        return redirect( route( 'dash-locations' ) )->with( ['message' => 'Location added!'] );
    }

    public function updateLocation( $id, Request $request ) {
        $location = Location::findOrFail( $id );

        $request->validate( [
            'name' => 'required',
            'city' => 'required',
        ] );

        $location->name = $request->name;
        $location->city = $request->city;

        $location->save();

        return redirect( route( 'dash-locations' ) )->with( ['message' => 'Location updated!'] );

    }

    public function deleteLocation( $id ) {

        $location = Location::findOrFail( $id );
        $location->delete();

        return redirect( route( 'dash-locations' ) )->with( ['message' => 'Location deleted!'] );

    }

}
