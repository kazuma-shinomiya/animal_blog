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
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection