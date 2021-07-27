<?php


namespace App\Http\Controllers;
use Auth;

class LoginController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
