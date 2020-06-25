<?php

namespace App\Http\Controllers;

use App\Article;
use App\Policies\ArticlePolicy;
use Illuminate\Http\Request;
use App\User;
use App\Auth;
use Illuminate\Support\Facades\Hash;


class CreateUserController extends Controller
{
    public function newModerator()
    {
        $this->authorize('create1', Article::class);
        return view('CreateModerator');
    }

    public function storeModerator(Request $request)
    {
        $this->authorize('create1', Article::class);
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = new User();
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = 2;
        $user->save();
        return back();
    }
}
