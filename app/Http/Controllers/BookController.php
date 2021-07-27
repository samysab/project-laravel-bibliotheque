<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    function saveBook(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255', 'min: 2'],
            'description' => ['required', 'min: 10', 'max: 255'],
            'image' => ['file', 'mimes:png,jpeg,jpg']
        ],
            [ 'required' => 'Le champs :attribute est requis.',
                'max' => 'Le champs :attribute ne doit pas comporter plus de :max',
                'min' => 'Le champs :attribute ne doit pas comporter moins de :min',
                'image.mimes' => 'Ce fichier n\'est pas image'
            ]
        );

        if(!Category::find($request->category)){
            return redirect('livres')->with('status', 'Cette catégorie n\'existe pas');
        }

        if (!empty($request->image)){
            $fileName = time().'.'.$request->image->extension();

            $request->file('image')->storeAs(
                'images',
                $fileName,
                'public'
            );
        }

        $bookSave = new Book();
        $bookSave->name = $request->name;
        $bookSave->description = $request->description;
        $bookSave->category_id = $request->category;
        if (!empty($fileName)){
            $bookSave->path = $fileName;
        }
        $bookSave->save();

        return redirect('livres')->with('status', 'Le livre a été ajouté !');
    }

    function deleteBook(Request $request){

        $bookDelete = Book::find($request->book_id);
        $bookDelete->delete();

        return redirect('livres')->with('status', 'Le livre a été supprimé !');
    }

    function updateDisplayBook(Request $request){

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

    function updateBook(Request $request){


        $request->validate([
            'name' => ['required', 'max:255', 'min: 2'],
            'description' => ['required', 'min: 10', 'max: 255'],
        ],
            [ 'required' => 'Le champs :attribute est requis.',
                'max' => 'Le champs :attribute ne doit pas comporter plus de :max',
                'min' => 'Le champs :attribute ne doit pas comporter moins de :min'
            ]
        );

        if(!Category::find($request->category)){
            return redirect('livres')->with('status', 'Cette catégorie n\'existe pas');
        }

        $bookUpdate = Book::find($request->book_id);
        $bookUpdate->name = $request->name;
        $bookUpdate->description = $request->description;
        $bookUpdate->category_id = $request->category;
        $bookUpdate->save();

        return redirect('livres')->with('status', 'Le livre a été modifié !');
    }


    function displayComments(Request $request){

        $book = Book::find($request->book_id);
        $comments = $book->comments;

        return view('infoBook', ['comments' => $comments, 'book' => $book, 'id' => $request->book_id]);

    }
}


