<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Mail\TestMarkdownMail;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function save(Request $request){


         $request->validate([
            'content' => ['required', 'max:255', 'min: 2'],
        ],
            [ 'required' => 'Le champs :attribute est requis.',
                'max' => 'Le champs :attribute ne doit pas comporter plus de :max caracteres',
                'min' => 'Le champs :attribute ne doit pas comporter moins de :min caracteres'

            ]
        );


        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->book_id = $request->book_id;

        $comment->save();

        $user = Auth::user();

        Mail::to($user->email)->send(new TestMarkdownMail($user));

        return back()->with("success","Commentaire envoyé !");


    }

    function delete(Request $request){


        $comment = Comment::find($request->comment_id);
        $getBook = $comment->book_id;

        $comment->delete();

        return redirect("/livre/$getBook")->with("success","Commentaire supprimé");

    }
}
