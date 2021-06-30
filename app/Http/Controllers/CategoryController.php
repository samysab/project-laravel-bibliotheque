<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    //Lister les films
    function index(){
        $categories = Category::all();

        return view('category', ['category' => $categories]);
    }
}
