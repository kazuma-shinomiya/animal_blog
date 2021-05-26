@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('layouts.sideMenu')
      @foreach($posts as $post)
        <div class="col-lg-4">
          @include('posts.post')
        </div>
      @endforeach
    </div>
  </div>
@endsection