<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class createUser extends Controller
{
    public function newuser ()
    {
        return view('CreateUser');

    }
}
