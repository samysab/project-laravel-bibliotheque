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

    //Supprime le post
    function delete(Request $request){

        $post = Category::find($request->category_id);
        $post->delete();

        return redirect('category')->with('status', 'category Deleted !');
    }
}
