<div class="col-lg-3 sidebar">
  @foreach($categories as $category)
    <nav class="navbar navbar-light bg-white border-bottom">
      <a class="navbar-brand" href="{{ route('posts.index', ['category'=>$category->name]) }}">{{ $category->name }}</a>
    </nav>
  @endforeach
</div>