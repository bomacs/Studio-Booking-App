<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class ManageUsersController extends Controller
{
    public function create() {
        return view('admin.users.create', [ 'roles' => Role::all(), ]);
    }

    public function store(Request $request) {

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
            'terms_conditions' => ['required'],
        ], ['policy.required' => 'You must agree in terms and conditions.']);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'terms_conditions' => $request-> terms_conditions
        ]);

          // Attached roles to the user
        if ($request->role)
        {
            $user->attachRole($request->role);  
        }
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

        return redirect(route('admin.dashboard'))->with('message', 'User was registered succcesfully');
    }
}
