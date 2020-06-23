<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Auth;
use Illuminate\Support\Facades\Hash;


class CreateUserController extends Controller
{
    public function newuser()
    {
        User::create([
            'name' => \request('nm'),
            'email' => \request('email'),
            'password' => \request('pw'),
            'role' => \request('role')
        ]);
    }
}
