@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      @include('layouts.sideMenu')
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">{{ $user->name }}</h2>
            <div class="card-text">
              <span>フォロー数：{{ $user->followings->count() }}</span>
              <span>フォロワー数：{{ $user->followers->count() }}</span>
            </div>
            @if(Auth::id() != $user->id)
              <div>
                @if($user->isFollowedBy(Auth::user()))
                  <a href="{{ route('users.unfollow', ['name' => $user->name]) }}" class="btn btn-success btn-sm">
                    フォロー中
                  </a>
                @else
                  <a href="{{ route('users.follow', ['name' => $user->name]) }}" class="btn btn-secondary btn-sm">
                    フォローする
                  </a>
                @endif
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection