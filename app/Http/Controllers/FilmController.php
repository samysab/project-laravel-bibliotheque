<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Film;

class FilmController extends Controller
{
    //

    //Lister les films
    function index(){
        $films = Film::all();

        return view('films', ['films' => $films]);
    }

}
