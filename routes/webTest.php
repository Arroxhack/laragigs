<?php

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

// All Listings
Route::get('/', function () { // you can pass a req or res obj inside the function also
    return view('listings', [ // this data [asdjhasdka], should come from a database.
        'heading' => 'Latest Listing',
        'listings' => Listing::all() // uso el metodo de la Clase/Modelo Listing // Now our data is coming from our Model.
        // [ // esto iria luego de => arriba
        //     [
        //         'id' => 1,
        //         'title' => 'Listing One',
        //         'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam rem eveniet reprehenderit provident reiciendis eaque. Voluptatum cumque dolore assumenda dolorum.'
        //     ],
        //     [
        //         'id' => 2,
        //         'title' => 'Listing Two',
        //         'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam rem eveniet reprehenderit provident reiciendis eaque.'
        //     ]
        // ]
    ]); // resource/views/welcome.etc
});

// Creating a new Route called single listing
Route::get('/listing/{id}', function ($id) {
    $listing = Listing::find($id);

    if($listing) {
        return view('listing', [
            'listing' => $listing
        ]);
    } else {
        abort(404);
    }
}); 


/* !!!!!!!! Estudio
Route::get('/hello', function() {
    return response('<h1>Hello World</h1>', 200)
    ->header("Content-Type", 'text/plain')
    ->header("foo", 'bar')
    ; 
}); // podemos verlo en RED

Route::get('/posts/{id}', function($id){ // {id} is a wild card
    // dd($id);
    return response("Post " . $id);
})->where('id', '[0-9]+'); // where es una funcion de la clase Route, o sea un metodo. Contrasto algo con una reg expr

Route::get('/search', function(Request $request){ // /search?name=Brad&city=Boston
    // dd($request); // query -> parameters in the browser
    return response($request->name . " " . $request->city); // recordar que -> sirve tanto para llamar a funciones como para acceder a propiedades de un objeto derivado de una clase.
});
 */