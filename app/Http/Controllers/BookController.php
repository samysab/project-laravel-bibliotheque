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

        $arrayNameCategory = [];
        $arrayIdCategory = [];

        foreach($category as $cat){
            $arrayNameCategory[] = $cat->name;
        }

        foreach($category as $cat){
            $arrayIdCategory[] = $cat->id;
        }

        $selectCategory = array_combine($arrayIdCategory, $arrayNameCategory);

        return view('books')->with(['books' => $books])->with(['categoryName' => $selectCategory]);
    }

    function saveBook(Request $request){

        $bookSave = new Book();
        $bookSave->name = $request->name;
        $bookSave->description = $request->description;
        $bookSave->category_id = $request->category;
        $bookSave->save();

        return redirect('livres')->with('status', 'Le livre a été ajouté !');
    }

    function deleteBook(Request $request){

        $bookDelete = Book::find($request->book_id);
        $bookDelete->delete();

        return redirect('livres')->with('status', 'Le livre a été supprimé !');
    }

    function updateBook(Request $request){
        $category = Category::all();

        $arrayNameCategory = [];
        $arrayIdCategory = [];

        foreach($category as $cat){
            $arrayNameCategory[] = $cat->name;
        }

        foreach($category as $cat){
            $arrayIdCategory[] = $cat->id;
        }

        $selectCategory = array_combine($arrayIdCategory, $arrayNameCategory);

        $bookUpdate = Book::find($request->book_id);
        return view('booksUpdate')->with(['book' => $bookUpdate])->with(['categoryName' => $selectCategory]);
    }
}
