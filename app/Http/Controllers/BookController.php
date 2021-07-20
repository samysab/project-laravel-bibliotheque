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

    function saveBook(Request $request)
    {

        $bookSave = new Book();
        $bookSave->name = $request->name;
        $bookSave->description = $request->description;
        $bookSave->save();

        return redirect('/livres');
    }


    function displayComments(Request $request){

        $book = Book::find($request->book_id);
        $comments = $book->comments;

        return view('infoBook', ['comments' => $comments, 'book' => $book, 'id' => $request->book_id]);

    }
}


