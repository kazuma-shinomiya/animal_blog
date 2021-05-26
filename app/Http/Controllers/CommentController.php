<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post){
        $comments = $post->comments->sortByDesc('created_at');
        return view('comments.index', compact('comments', 'post'));
    }

    public function store(CommentRequest $request, Post $post, Comment $comment){
        $comment->fill($request->all());
        $comment->user_id = $request->user()->id;
        $comment->post_id = $post->id;
        $comment->save();
        return redirect()->route('comments.index', ['post' => $post]);
    }

    public function edit(Post $post, Comment $comment){
        $old_comment = $comment;
        $comments = $post->comments->sortByDesc('created_at');
        return view('comments.edit', compact('comment', 'comments', 'post', 'old_comment'));
    }

    public function update(CommentRequest $request, Post $post, Comment $comment){
        $comment->fill($request->all())->save();
        return redirect()->route('comments.index', ['post' => $post]);
    }

    public function destroy(Post $post, Comment $comment){
        $comment->delete();
        return redirect()->route('comments.index', ['post' => $post]);
    }
}
