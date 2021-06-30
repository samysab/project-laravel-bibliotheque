<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{
    function plip($truc = null){
        return view('plip', ['truc'=>$truc]);
    }


    //Afficher le formulaire de post et lister les posts
    function index(){
        $posts = Post::all();

        return view('wall', ['posts' => $posts]);
    }

    //recevoir un post depuis un formulaire et le save en BDD
    function post(Request $request){

        $post = new Post();
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();

        return redirect('wall');
    }

    //Afficher le form de mise a jour d'un post
    function update(Request $request){

        $post = Post::find($request->post_id);
        return view('postUpdate', ['post' => $post]);
    }

    //recoit le form de MaJ d'un post
    function save(Request $request){

        $post = Post::find($request->post_id);
        $post->content = $request->name;
        $post->save();

        return redirect('/wall')->with('status', 'Post Updated !');
    }

    //Supprime le post
    function delete(Request $request){

        $post = Post::find($request->post_id);
        $post->delete();

        return redirect('wall')->with('status', 'Post Deleted !');
    }

}
