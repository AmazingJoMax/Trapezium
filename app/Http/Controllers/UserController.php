<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Register Form
    public function create(){
        return view('user.register');
    }

    //Create User
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', Rule::unique('users', 'email')],
            //'profile_pic' => ['image','mimes:jpg,png,jpeg,gif,svg|max:2048'],
            'password' => ['required', 'confirmed', 'min:6'],

        ]);

        //Hash Password 
        $formFields['password'] = bcrypt($formFields['password']);

        //profile picture
        if($request->hasFile('profile_pic')){
            
            $formFields['profile_pic'] = $request->file('profile_pic')
            ->validate('profile_pic', ['image','mimes:jpg,png,jpeg,gif,svg|max:2048'])
            ->store('profile', 'public');
        }

        //Create User
        $user = User::create($formFields);

        //Log user in
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in successfully!');
    }

    public function logout(Request $request){
        auth()-> logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
                
    }

    public function login(){
        return view('user.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You have sucessfully logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    //Update Profile
    public function update(Request $request){
        //Authorizing only logged in user

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')],
            //'profile_pic' => ['image','mimes:jpg,png,jpeg,gif,svg|max:2048'],
            'password' => ['required', 'confirmed', 'min:6'],


        ]);

        //To store and save image path to database
        if($request->hasFile('profile_pic')){
    
            $formFields['profile_pic'] = $request->file('profile_pic')->store('profile', 'public');
        }

        

        auth()->user()->id->update($formFields);

        return('Profile updated successfully!');
    }

    //Delete Listing
    public function destroy(User $user){

        $user->delete();

        return redirect('/');
        
    }

}
