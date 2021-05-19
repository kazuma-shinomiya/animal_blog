@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('posts.store') }}">
            @include('posts.form')
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection