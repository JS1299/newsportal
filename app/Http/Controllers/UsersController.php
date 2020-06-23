<?php

namespace App\Http\Controllers;

use App\User;
use \Auth;

class UsersController extends Controller
{
    public function users()
    {
        $users = User::userr()->get();
        return view('UsersPanel')->withUsers($users);
    }
}
