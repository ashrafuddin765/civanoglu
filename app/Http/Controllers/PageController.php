<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller {
    //
    public function single( $slug ) {
        $page = Page::where( 'slug', $slug )->first();

        if ( !empty( $page ) ) {
            return view( 'page', [
                'page' => $page,
            ] );
        }

        return abort( '404' );

    }
}
