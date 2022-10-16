<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms_conditions' => ['required'],
        ], ['policy.required' => 'You must agree in terms and conditions.']);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'terms_conditions' => $request-> terms_conditions
        ]);

          // Attached roles to the user
        $user->attachRole('user');

        // Create temporary profile
        $user->userProfile()->updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'firstname' => ' ',
                'lastname' => ' ',
                'gender' => ' ',
                'phone_no' => ' ',
                'address' => ' ',
                'birthday' =>  date('Y-m-d'),
                'aboutself' => ' ',
                'experience' => ' ',
                'expertise' => ' ',
                'image_path' => 'defaultpic.jpg',
            ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
