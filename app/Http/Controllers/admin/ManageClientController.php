<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class ManageClientController extends Controller
{
    public function create() {
        return view('admin.clients.create');
    }

    public function store(Request $request) {

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

        return redirect(route('admin.dashboard'))->with('message', 'Client was registered succcesfully');
    }

    /**
     * Show single user
     */
    // public function show($id)
    // {
    //     return view('admin.users.show', [
    //         'user' => User::findOrFail($id),
    //     ]);
    // }

    // public function edit($id)
    // {
    //     return view('admin.users.edit', [
    //         'user' => User::findOrFail($id),
    //         'roles' => Role::all(),
    //     ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'username' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255'],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'role' => ['required'] 
    //     ]);
      
    //     $user = User::findOrFail($id);
    //     $role_id = $user->roles->first()->id;
    //     $user->detachRole($role_id);
    //     // save to database
    //     $user->username = $request->username;
    //     $user->email = $request->email;
    //     $user->password = $request->password;
    //     $user->attachRole($request->role);
    //     $user->save();

    //     return redirect()->back()->with("message", "User was updated successfully.");
    // }

    
    // /**
    //  * Delete user record
    //  */
    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->back()->with("message", "User was deleted successfully!");
    // }
}
