<?php

use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group( ['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get( '/', [HomeController::class, 'home'] )->name( 'home' );
    Route::get( '/property/{id}', [PropertyController::class, 'single'] )->name( 'single-property' );
    Route::get( '/properties', [PropertyController::class, 'index'] )->name( 'properties' );
    Route::get( '/page/{slug}', [HomeController::class, 'single'] )->name( 'page' );
    Route::post( '/property-inquiry/{id}', [ContactController::class, 'propertyInquiry'] )->name( 'property-inquiry' );
    Route::get( '/currency/{code}', [HomeController::class, 'currencyChange'] )->name( 'currency-change' );
} );

Route::middleware( 'auth' )->group( function () {
    Route::get( '/dashboard', [DashboardController::class, 'index'] )->name( 'dash-index' );

    Route::get( '/dashboard/properties', [DashboardController::class, 'properties'] )->name( 'dash-properties' );
    Route::get( '/dashboard/add-property', [DashboardController::class, 'addProperty'] )->name( 'add-property' );
    Route::post ( '/dashboard/create-property', [DashboardController::class, 'createProperty'] )->name( 'create-property' );
    Route::get( '/dashboard/edit-property/{id}', [DashboardController::class, 'editProperty'] )->name( 'edit-property' );
    Route::post( '/dashboard/update-property/{id}', [DashboardController::class, 'updateProperty'] )->name( 'update-property' );
    Route::post( '/dashboard/delete-property/{id}', [DashboardController::class, 'deleteProperty'] )->name( 'delete-property' );
    Route::post( '/dashboard/delete-media/{media_id}', [DashboardController::class, 'deleteMedia'] )->name( 'delete-media' );
    

    Route::get( '/dashboard/locations', [DashboardController::class, 'locations'] )->name( 'dash-locations' );
    Route::get( '/dashboard/add-location', [DashboardController::class, 'addLocation'] )->name( 'add-location' );
    Route::post ( '/dashboard/create-location', [DashboardController::class, 'createLocation'] )->name( 'create-location' );
    Route::get( '/dashboard/edit-location/{id}', [DashboardController::class, 'editLocation'] )->name( 'edit-location' );
    Route::post( '/dashboard/update-location/{id}', [DashboardController::class, 'updateLocation'] )->name( 'update-location' );
    Route::post( '/dashboard/delete-location/{id}', [DashboardController::class, 'deleteLocation'] )->name( 'delete-location' );

    Route::resource('dashboard-page', AdminPageController::class );
} );

require __DIR__ . '/auth.php';
