<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; #class storage
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
    return view('admin.posts.create', compact('tags'));
    }

    public function store(Request $request){
        $request->validate($this->validationRules());

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['slug']= Str::slug($data['title'], '-');

        #prep the file object
        if(!empty($data['path_img'])){
            $data['path_img'] = Storage::disk('public')->put('images', $data['path_img']);
        };

        $newPost = new Post();
        $newPost->fill($data);
        $saved = $newPost->save();
        
        if ($saved) {
            if ( !empty($data['tags'])){
                $newPost->tags()->attach($data['tags']);
            }
        }
        
        Mail::to('test@test.it')    
            ->send(new SendNewMail());
        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post){
        
        if (empty($post)) {
            abort('404');
        }
        #dd($post);
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();

    return view('admin.posts.edit', compact('post','tags'));
    }

    public function update(Request $request, Post $post){
        
        $request->validate($this->validationRules());
        $data = $request->all();

        if(!empty($data['path_img'])){
            #delete existing
            if(!empty($post->path_img)){
                Storage::disk('public')->delete($post->path_img);
            }


            #set new
            Storage::disk('public')->put('images', $data['path_img']);
        }

        $updated = $post->update($data);

        if ($updated){
            if (!empty($data['tags'])){
                $post->tags()->sync($data['tags']);
            } else {
                $post->tags()->detach();
            }
        }

        return redirect()->route('admin.posts.show', $post->id/*slug*/);
    }

    
    public function destroy(Post $post){
        if (empty($post)){
            abort('404');
        }

        $oldPost = $post->title;
        $post->tags()->detach();
        $post->comments()->delete();
        $deleted = $post->delete();

        if ($deleted){
            if(!empty($post->path_img)){
                Storage::disk('public' )->delete($post->path_img);
            }
            return redirect()->route('admin.posts.index')->with('hasDeleted', $oldPost);
        }
    }

    private function validationRules(){
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            'tags.*' => 'exists:tags,id', //.* all the values of the collection
            'path_img' => 'image'
        ];
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
        
        return view('admin.posts.search', compact('posts'));
    }
}
