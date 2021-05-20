@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      @foreach($posts as $post)
        <div class="col-lg-4">
          <div class="card mt-4">
            <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="card-img-top" alt="..."/>
            <div class="card-body">
              <p>{{ $post->title }}</p>
              <p>{{ $post->body }}</p>
              <p>{{ $post->category->name }}</p>
            </div>
            @if(Auth::id() == $post->user_id)
              <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  menu
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('posts.edit', ['post' => $post]) }}">編集</a>
                  <a class="dropdown-item" href="{{ route('posts.edit', ['post' => $post]) }}">編集</a>
                </div>
              </div>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection