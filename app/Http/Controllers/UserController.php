<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create(){
        return view('users.register'); 
    }

    // Create New User
    public function store(Request $request){
        // dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'], // at least 3 characters
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'password_confirmation' => ['required', 'min:6']
        ]);

        // Hash Password with BCRYPT
        $formFields['password'] = bcrypt($formFields['password']);

        // Creating user and then login
        $user = User::create($formFields); // User is our Model // The inserted model instance will be returned

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in successfully!'); 
        
    }   

    // Logout User
    public function logout(Request $request){
        // dd($request->session());
        auth()->logout(); // this removes the authentication info from the user session 

        $request->session()->invalidate(); // It is also recomended that we invalidate the user session 
        $request->session()->regenerateToken(); // and regenerate their CRSF token

        return redirect('/')->with('message', 'User logout successfully!');
    }

    // Show Login Form
    public function login(Request $request){
        return view('users.login');
    }

    // Login/Authenticate User
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){ // method called attempt to attempt to log the user in
            $request->session()->regenerate(); // if true we want to regenerate a session id

            return redirect('/')->with('message', 'User login successfully!'); 
        } 

        // If the attempt fails..
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email'); // we show that one of the two is invalid we dont say which of them // we put it in the email failed
    }
}
