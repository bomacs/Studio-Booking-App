<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PhotographerController extends Controller
{
    public function index()
    {
        return view('photographer.index', [
            'photographers' => User::whereRoleIs('photographer')->get(),
        ]);
    }
}
