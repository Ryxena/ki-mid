@extends('Auth.layouts')
@section('content')
<div class="d-flex">
    <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
        <div class="card-header">{{ $user()->nama }} !</div>
        <div class="card-body">
            <h5 class="card-title">Details</h5>
            <p class="card-text">Email : {{ $user->email }} </p>
        </div>
    </div>
</div>
@endsection