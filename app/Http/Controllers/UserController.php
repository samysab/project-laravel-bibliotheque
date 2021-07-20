<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Display users
    function showUsers(){
        $users = User::all();

        return view('displayUsers', ['users' => $users]);
    }

    //Form to create users
    function formUser(){
        $users = User::all();

        return view('formUser', ['users' => $users]);    
    }

    function createUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->isAuthor = $request->isAuthor;
        $user->save();

        return redirect('users');
    }

    function deleteUser(Request $request){

        $user = User::find($request->user_id);
        $user->delete();

        return redirect('users')->with('status', 'User Deleted !');
    }

}
