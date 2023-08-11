<?php

namespace App\Http\Controllers;

use App\Models\Listing;  // !!!! importo el modelo para usarlo // al escribir Listing hay un icono que me lo trae directamente
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Get and show all listings
    public function index(Request $request){ // we dont need this, theres a method. // This is the request which has a request method of get, a url of /laragigs/public, query where queries like this ?varname=value are placed, etc.
        // dd(request()); // to get the value of the tag we create
        return view('listings.index', [ // listings.index !!!! because we are getting the file which is inside the listings folder and the files name is index.blade.php.
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get() // uso el metodo de la Clase/Modelo Listing // Now our data is coming from our Model. Doing Listing::all() is the same but now is sorted to get the latest first. all() is just random order. // !!!! ->filter(request(['tag'])) Esto es para usar el methodo filterScope que le agregue al Modelo. Le paso el ['tag'] como array.
        ]); 
    }

    // Show single listing
    public function show(Listing $listing){
        return view('listings.show', [ // listings.show !!!! because we are getting the file which is inside the listings folder and the files name is show.blade.php.
            'listing' => $listing
        ]);
    }
}
