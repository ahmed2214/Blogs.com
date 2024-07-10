@extends('layouts.appUser')
@section('title')
    Show
@endsection
@if (session('user') != null)
    @section('userName')
        Wlecome {{ session('user') }}
    @endsection
@endif
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title : <span>{{ $Post->title }}</span></h5>
            <p class="card-text">Descrption : <span>{{ $Post->descrption }}</span></p>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name : <span>{{ $Post->user ? $Post->user->name : 'Not Found' }}</span></h5>
            <p class="card-text">Email : <span>{{ $Post->user ? $Post->user->email : 'Not Found' }}</span></p>
            <p class="card-text">Created At : <span>{{ $Post->user ? $Post->user->created_at : 'Not Found' }}</span></p>

        </div>
    </div>
@endsection
