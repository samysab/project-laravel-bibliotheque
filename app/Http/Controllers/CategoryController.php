<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $category = Category::find($request->category_id);
        $category->delete();

        return redirect('category')->with('status', 'category Deleted !');
    }

    //recevoir un post depuis un formulaire et le save en BDD
    function post(Request $request){

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect('category');
    }
}
