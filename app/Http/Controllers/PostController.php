<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('guest.posts.index', compact('posts'));
    }

    public function show($id){
        $post = Post::where('id', $id)->get();
        
        if (empty($post)) {
            abort('404');
        }

        return view('guest.posts.show', compact('post'));
    }
}
