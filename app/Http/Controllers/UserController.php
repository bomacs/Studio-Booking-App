<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function indexProfile() {

        $userProfile = User::findOrFail(Auth::user()->id);

        if (Auth::user()->hasRole('administrator')) {

            return view('admin.profile');

        } elseif (Auth::user()->hasRole('photographer')) {

            return view('photographer.profile', [
                'userProfile' => $userProfile
            ]);

        } elseif (Auth::user()->hasRole('user')) {

            return view('user.profile', [
                'userProfile' => $userProfile
            ]);
        } 
    }

    public function createProfile()
    {
        $userProfile = User::findOrFail(Auth::user()->id);

        if (Auth::user()->hasRole('administrator')) {
            return view('admin.createProfile');
        } elseif (Auth::user()->hasRole('photographer')) {
            
            return view('photographer.createProfile', [
                'userProfile' => $userProfile
            ]);
            
        } elseif (Auth::user()->hasRole('user')) {

            return view('user.createProfile', [
            'userProfile' => $userProfile
        ]);
        } 
    }

    public function updateProfile(Request $request) 
    {

        $request->validate([
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'phone_no' => ['required', 'digits:11'],
            'address' => ['required', 'string', 'max:499'],
            'birthday' => ['required', 'date'],
            'aboutself' => ['min:3', 'max:1000'],
            'experience' => ['max:1000'],
            'expertise' => ['max:1000'],
            'image' => ['mimes:jpg,png,jpeg','max:1024'],
        ]);

        if($request->image) {
            $newImageName = time() . '-' . auth()->user()->username . '.' . $request->image->extension();
            $request->file('image')->move(public_path('imgs\profile_pic'), $newImageName);
        }else {
            $newImageName = 'defaultpic.jpg';
        }

        $user = User::findOrFail(auth()->user()->id);

        $user->userProfile()->updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'gender' => $request->input('gender'),
                'phone_no' => $request->input('phone_no'),
                'address' => $request->input('address'),
                'birthday' => $request->input('birthday'),
                'aboutself' => $request->input('aboutself'),
                'experience' => $request->input('experience'),
                'expertise' => $request->input('expertise'),
                'image_path' => $newImageName,
            ]);
    
        if (auth()->user()->hasRole('photographer'))
        {
            return redirect(route('photographer.profile'))->with('message', 'Profile was updated successfully.');
        } elseif (auth()->user()->hasRole('user'))
        {
            return redirect(route('user.profile'))->with('message', 'Profile was updated successfully.');
        }
    }

    public function showProfile($id)
    { 
        $user = User::findOrFail($id);

        return view('common.showProfile', [
            'user' =>  $user 
         ]) ;

        // if($user->hasRole('photographer')){
        //     return view('common.showProfile', [
        //         'user' =>  $user 
        //      ]) ;
        // }else
        // {
        //     return abort(404);
        // }
    }
}
