<?php

namespace App\Http\Controllers;

use App\User;
use \Auth;

class UsersController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('UsersPanel', compact('users'));
    }
}
