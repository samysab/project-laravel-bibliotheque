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
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'min: 2'],
            'description' => ['required', 'min: 10', 'max: 255'],
        ],
            [ 'name.required' => 'Le champs :attribute est requis.',
                'max' => 'Le champs :attribute ne doit pas comporter plus de :max caracteres',
                'min' => 'Le champs :attribute ne doit pas comporter moins de :min caracteres'

            ]
        );

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;




        $category->save();

        return redirect('category');
    }

    function update(Request $request){

        $category = Category::find($request->category_id);
        return view('categoryUpdate', ['category' => $category]);
    }

    //recoit le form de MaJ d'un post
    function save(Request $request){

        $category = Category::find($request->category_id);
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect('/category')->with('status', 'Category Updated !');
    }
}
