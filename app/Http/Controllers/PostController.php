<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all()->sortByDesc('created_at');
        return view('posts.index', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(PostRequest $request, Post $post){
        $post->fill($request['post']);
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect()->route('posts.index');
    }
}
