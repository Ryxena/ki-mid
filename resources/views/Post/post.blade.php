@extends('layouts')
@section('content')
<div id="intro" class="p-5 text-center bg-dark">
    <h1 class="mb-0 h4">{{ $post->title }}</h1>
</div>
<section>
    <p>
        {{ $post->content }}
    </p>
</section>
@endsection