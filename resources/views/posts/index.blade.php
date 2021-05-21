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
            <div>
              @if($post->isLikedBy(Auth::user()))
                <a href="{{ route('posts.unlike', $post) }}" class="btn btn-success btn-sm">
                  いいね
                  <span class="badge">
                    {{ $post->likes()->count() }}
                  </span>
                </a>
              @else
                <a href="{{ route('posts.like', $post) }}" class="btn btn-secondary btn-sm">
                  いいね
                  <span class="badge">
                    {{ $post->likes()->count() }}
                  </span>
                </a>
              @endif
            </div>
            @if(Auth::id() == $post->user_id)
              <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  menu
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('posts.edit', ['post' => $post]) }}">編集</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#delete-modal">削除</a>
                </div>

                <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <label>データを削除しますか？</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                            <button type="submit" class="btn btn-danger">削除</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection