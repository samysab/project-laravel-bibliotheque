<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Display users
    function showUsers(){
        $users = User::where('isAuthor', 1)
                        ->get();

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
        $user->password = Hash::make($request->password);
        $user->isAuthor = $request->isAuthor;
        $user->save();

        return redirect('users');
    }

    function deleteUser(Request $request){

        $user = User::find($request->user_id);
        $user->delete();

        return redirect('users')->with('status', 'User Deleted !');
    }

    function updateUser(Request $request){
        $user = User::find($request->user_id);

        $data = User::where('id', $user->id)
                ->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password)
                ]);

        return redirect('users')->with('status', 'User updated !');
    }

    /*form to update user*/
    function formUserUpdate(Request $request){
        $user = User::find($request->user_id);
        $data = User::where('id', $user->id)
            ->get();

        return view('displayUserUpdate', ['user' => $user]);
    }

}
