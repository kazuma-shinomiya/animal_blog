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

    public function index(Request $request){
        $posts = Post::orderBy('created_at', 'asc')->categoryAt($request->category)->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request, Post $post){
        $post->fill($request['post']);
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
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
