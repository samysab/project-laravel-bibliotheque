<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function displayBooks(){
        $books = Book::all();

        return view('displayBooks', ['books' => $books]);
    }

    function index(){
        $books = Book::all();
        $category = Category::all();
        //ddd($category);

        $select = [];

        foreach($category as $cat){
            $select[] = $cat->name;
        }

        return view('books')->with(['books' => $books])->with(['category' => $select]);
    }

    function saveBook(Request $request){

        $bookSave = new Book();
        $bookSave->name = $request->name;
        $bookSave->description = $request->description;
        $bookSave->category = $request->category;
        $bookSave->save();

        return redirect('/livres');
    }
}
