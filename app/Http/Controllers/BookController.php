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
}
