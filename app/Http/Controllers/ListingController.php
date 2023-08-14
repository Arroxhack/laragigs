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
        // dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(2));
        // dd(request()); // to get the value of the tag we create
        return view('listings.index', [ // listings.index !!!! because we are getting the file which is inside the listings folder and the files name is index.blade.php.
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6) // uso el metodo de la Clase/Modelo Listing // Now our data is coming from our Model. Doing Listing::all() is the same but now is sorted to get the latest first ORDER BY `created_at` DESC. all() is just random order. // !!!! ->filter(request(['tag'])) Esto es para usar el methodo filterScope que le agregue al Modelo. Le paso el ['tag'] como array.
        ]); // instead of the method ->get() to get the listings we can use paginate method to also paginate, paginate takes a number of elements we want per page. If we change the page variable in the url to 1, 2 etc, the pages change // !!!! simplePaginate() another way of doing it without showing numbers, just next and previous 
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
        // dd($request->file('logo')); // searching whats in the logo input
        $formFields = $request->validate([ // validate takes in an array specifing what rules do we want for specific fields
            'title' => 'required',
            'tags' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')], // using array for more than one rule // Rule Class that has methods in it // unique('listings') listings is the name of the table that we are using, and the other parameter is the name of the field that it should be unique for
            'location' => 'required',
            'email' => ['required', 'email'], // 'email' formated as an email
            'website' => 'required',
            'description' => 'required'
        ]); // If any of these fails when sending the form it will send an error to the view.

        // Adding path to the database
        if($request->hasFile('logo')) { // if a logo is uploaded in the form
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // we set it to the path and upload it at the same time. We will have a folder called logos in the storage/app/public folder
            // dd($formFields);
        }

        Listing::create($formFields);

        // flash message, we need a component to see it in the view also
        // Session::flash('message', 'Listing Created successfully!'); // Flash message when created

        return redirect('/')->with('message', 'Listing created successfully!'); // otherway of flash message // 'message' can be many things there are some strings for errors, success etc

        // dd($request->all());
    }

    // Show Edit Form
    public function edit(Listing $listing){
        // dd($listing->title);
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing){
        // dd($request->file('logo')); // searching whats in the logo input
        $formFields = $request->validate([ // validate takes in an array specifing what rules do we want for specific fields
            'title' => 'required',
            'tags' => 'required',
            'company' => ['required'], // using array for more than one rule // Rule Class that has methods in it // unique('listings') listings is the name of the table that we are using, and the other parameter is the name of the field that it should be unique for
            'location' => 'required',
            'email' => ['required', 'email'], // 'email' formated as an email
            'website' => 'required',
            'description' => 'required'
        ]); // If any of these fails when sending the form it will send an error to the view.

        // Adding path to the database
        if($request->hasFile('logo')) { // if a logo is uploaded in the form
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // we set it to the path and upload it at the same time. We will have a folder called logos in the storage/app/public folder
            // dd($formFields);
        }

        $listing->update($formFields);

        // flash message, we need a component to see it in the view also
        // Session::flash('message', 'Listing Created successfully!'); // Flash message when created

        return back()->with('message', 'Listing updated successfully!'); // otherway of flash message // 'message' can be many things there are some strings for errors, success etc

        // dd($request->all());
    }

    // Delete Listing
    public function destroy(Listing $listing){
        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully!');
    }


}
