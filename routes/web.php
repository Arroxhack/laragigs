<?php

use App\Http\Controllers\ListingController;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing; // we bring our Model

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* !!!! naming conventions - Common Resource (a blog post, a user, a listing, an employee, ehatever the resource) Routes:

    // !!!! we are using listings here but it could be any other resource
    index - Show all listings
    show - Show single listing
    create - Show form to create new listing (display the form on screen)
    store - Store new listing (submit the form)
    edit - Show form to edit listing (display the form on screen to edit)
    update - Update listing (submit the edit form)
    destroy - Delete listing

*/

// All Listings
Route::get('/', [ListingController::class, 'index']);  // we want the / to go to the Listing controller (traer el modelo, se hace auto pero por las dudas) and the index method
    


// Show Create form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);



// Creating a new Route called single listing
Route::get('/listing/{listing}', [ListingController::class, 'show']); 
