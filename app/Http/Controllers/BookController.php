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

        if (empty($request->name)||
            empty($request->description)||
            empty($request->category)){
            return redirect('livres')->with('status', 'Veuillez remplir tous les champs');
        }

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

        if (empty($request->name)||
            empty($request->description)||
            empty($request->category)){
            return redirect('livres')->with('status', 'Veuillez remplir tous les champs');
        }

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

        return view('infoBook', ['comments' => $comments]);

    }
}


