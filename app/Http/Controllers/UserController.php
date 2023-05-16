<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    //show create form
    public function create(){
        return view('users.register');
    }

    //save form
    public function store(Request $request){
        $formContents = $request->validate([
            'name' => ['required', 'min:5'], // required|min:5
            'email' => ['required', 'email' , Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        //hash password
        $formContents['password'] = bcrypt($formContents['password']);

        //save
        $user = User::create($formContents);

        //auto-log in user
        auth()->login($user);

        return redirect('/')->with('message', 'User created succesfully and logged in!');
    }

    //logout
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out successfull!');
    }

    //show login form
    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formContents = $request->validate([
            'email'=>'required|email',
            'password' =>'required'
        ]);

        if(auth()->attempt($formContents)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }
}
