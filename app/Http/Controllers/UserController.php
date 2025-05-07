<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    // display users
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    // show single user
    public function show(User $user)
    {
        // ddd($user);
        return view('users.profile', [
            'user' => $user
        ]);
    }

    // create user form
    public function create()
    {
        return view('users.register');
    }

    // store new user
    public function store(Request $request)
    {
        // validate fields
        $fields = $request->validateWithBag('reg_errors', [
            'name' => ['string', 'min:3'],
            'email' => ['string', 'email', \Illuminate\Validation\Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::defaults()]
        ]);

        // hash password
        $fields['password'] = bcrypt($fields['password']);

        // save new user to db
        $user = User::create($fields);

        // login user
        auth()->login($user);

        // redirect to home page
        return redirect('/');
    }

    // edit user form
    public function edit($id, Request $request)
    {
        print_r("edit was called");
        ddd($id);
        // if(User.validator($request))
    }

    // update user in db
    public function update($id, Request $request)
    {
        ddd($id);
        // get user the id
    }

    // delete user
    public function destroy($id)
    {
        // $id = User.find(['id' => $id]);
    }

    // login user
    public function login(Request $request)
    {
        // ddd($request);
        return view('users.login');

    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Login successful!');
        } else {
            return back()->withErrors(['invalid' => 'email or password incorrect']);
        }
    }
}