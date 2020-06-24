<?php

namespace App\Http\Controllers;

use App\User;
use \Auth;
use App\Article;

class UsersController extends Controller
{
    public function users()
    {
        $this->authorize('create1', Article::class);
        $users = User::all();
        return view('UsersPanel', compact('users'));
    }

    public function destroy(User $user)
    {
        if(auth()->user() == $user) {
            flash()->overlay("You can't delete yourself.");

            return redirect('/UsersPanel');
        }

        $user->delete();
        flash()->overlay('User has beendeleted successfully.');

        return redirect('/UsersPanel');
    }
}
