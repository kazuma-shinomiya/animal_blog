<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Post::class, 'post');
    }

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

    public function edit(Post $post){
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, Post $post){
        $post->fill($request['post'])->save();
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function like(Request $request, Post $post){
        $post->likes()->detach($request->user()->id);
        $post->likes()->attach($request->user()->id);
        return redirect()->route('posts.index');
    }

    public function unlike(Request $request, Post $post){
        $post->likes()->detach($request->user()->id);
        return redirect()->route('posts.index');
    }
}
