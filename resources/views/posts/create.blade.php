@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group mb-3">
              <label for="post-title" class="form-label">Title</label>
              <input type="text" class="form-control" id="post-title" name="post[title]" value="{{ old('post.title') }}">
              {{ $errors->first('post.title') }}
            </div>
            <div class="form-group mb-3">
              <label for="post-body" class="form-label">Body</label>
              <textarea class="form-control" id="post-body" rows="3" name="post[body]">{{ old('post.body') }}</textarea>
              {{ $errors->first('post.body') }}
            </div>
            <div class="form-group mb-3">
              <label for="post-image" class="form-label">Photo</label>
              <input type="text" class="form-control" id="post-image" name="post[image]">
            </div>
            <div class="form-group mb-3">
              <label for="post-category" class="form-label">Category</label>
              <select id="post-category" class="custom-select form-control" name="post[category_id]">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <input type="submit" class="btn btn-primary" value="保存">
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection