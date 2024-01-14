@extends('layouts')
@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ($post as $posts)
  <div class="col">
    <div class="card h-100">
      <img src="https://dummyimage.com/600x400/000/fff" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $posts->title }}</h5>
        <p class="card-text">{{ Str::limit($posts->content, 100, '...') }}</p>
        <div class="d-flex justify-content-between">
            <a href="/post/{{ $posts->lang }}/{{ $posts->slug }}" class="btn btn-primary">{{ __('message.button') }}</a>
        </div>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">{{ __('message.latest') }} {{ $posts->updated_at->diffForHumans() }}</small>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection