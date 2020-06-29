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

    public function show(Post $post){
        
        if (empty($post)) {
            abort('404');
        }

        return view('guest.posts.show', compact('post'));
    }

    public function searchByKeys(Request $request){
        $keys = $request['keys'];
        $collection = Post::all();
        $posts = [];
        foreach ($collection as $item){
            if ( strpos($item->title, $keys) || strpos($item->body, $keys)){
                $posts[] = $item;
            }
        }

        return view('guest.posts.search', compact('posts'));
    }
}
