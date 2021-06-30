<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function displayBooks(){
        $books = Book::all();

        return view('displayBooks', ['books' => $books]);
    }

    function index(){
        $books = Book::all();

        return view('books', ['books' => $books]);
    }

    function saveBook(Request $request){

        $bookSave = new Book();
        $bookSave->name = $request->name;
        $bookSave->description = $request->description;
        $bookSave->save();

        return redirect('/livres');
    }
}
