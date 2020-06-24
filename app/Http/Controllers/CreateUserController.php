<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Auth;
use Illuminate\Support\Facades\Hash;


class CreateUserController extends Controller
{
    public function newModerator()
    {
        return view('CreateModerator');
    }

    public function storeModerator(Request $request)
    {
//        dd($request);

        $moderator = new User();
        $data = $request;
        $password = $data->password;
        Hash::make($password);
        $password = bcrypt('secret');

        $moderator->name = $data->name;
        $moderator->email = $data->email;
        $moderator->password = $password;
        $moderator->role = 2;
        $moderator->save();
        return back();
    }
}
