<?php

namespace App\Http\Controllers;

use App\Models\Listing;  // !!!! importo el modelo para usarlo // al escribir Listing hay un icono que me lo trae directamente
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Get and show all listings
    public function index(Request $request){ // we dont need this, theres a method. // This is the request which has a request method of get, a url of /laragigs/public, query where queries like this ?varname=value are placed, etc.
        // dd(request()); // to get the value of the tag we create
        return view('listings.index', [ // listings.index !!!! because we are getting the file which is inside the listings folder and the files name is index.blade.php.
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get() // uso el metodo de la Clase/Modelo Listing // Now our data is coming from our Model. Doing Listing::all() is the same but now is sorted to get the latest first ORDER BY `created_at` DESC. all() is just random order. // !!!! ->filter(request(['tag'])) Esto es para usar el methodo filterScope que le agregue al Modelo. Le paso el ['tag'] como array.
        ]); 
    }

    // Show single listing
    public function show(Listing $listing){
        return view('listings.show', [ // listings.show !!!! because we are getting the file which is inside the listings folder and the files name is show.blade.php.
            'listing' => $listing
        ]);
    }

    
    // Show Create form
    public function create(){
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request){
        $formFields = $request->validate([ // validate takes in an array specifing what rules do we want for specific fields
            'title' => 'required',
            'tags' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')], // using array for more than one rule // Rule Class that has methods in it // unique('listings') listings is the name of the table that we are using, and the other parameter is the name of the field that it should be unique for
            'location' => 'required',
            'email' => ['required', 'email'], // 'email' formated as an email
            'website' => 'required',
            'description' => 'required'
        ]); // If any of these fails when sending the form it will send an error to the view.

        Listing::create($formFields);

        // flash message, we need a component to see it in the view also
        // Session::flash('message', 'Listing Created successfully!'); // Flash message when created

        return redirect('/')->with('message', 'Listing Created successfully!'); // otherway of flash message // 'message' can be many things there are some strings for errors, success etc

        // dd($request->all());
    }


}
