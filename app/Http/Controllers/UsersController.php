<?php

namespace App\Http\Controllers;

use App\User;
use \Auth;
use App\Article;

class UsersController extends Controller
{
//    public function users()
//    {
//        $this->authorize('create1', Article::class);
//        $users = User::all();
////        dd($users);
//        return view('UsersPanel')->with(['users'=>$users]);
//    }

    public function index() {
        return view('UsersPanel');
    }

    public function userFetchList() {
        $users = User::all();
        echo json_encode($users);
    }

    public function active_deactive_user($id) {
        $user = User::find($id);
        if($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        if($user->save()) {
            echo json_encode('success');
        } else {
            echo json_encode('failed');
        }
    }

//    public function destroy(User $user)
//    {
//        if(auth()->user() == $user) {
//            flash()->overlay("You can't delete yourself.");
//
//            return redirect('/UsersPanel');
//        }
//
//        $user->delete();
//        flash()->overlay('User has been deleted successfully.');
//
//        return redirect('/UsersPanel');
//    }
}
