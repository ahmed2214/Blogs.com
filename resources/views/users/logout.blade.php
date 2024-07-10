@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
    <div class=" mt-4 w-50 m-auto">
        <h1 class="h1 text-center">Login</h1>
        <form method="post" action="{{ route('users.findUser') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="exampleFormControlInput1">Email</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Email"
                name="email" value="{{ old('email') }}">
            <label for="exampleFormControlInput1">password</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your password"
                name="password" value="{{ old('password') }}">

            <button type="submit" class="btn btn-primary mt-4">Login</button>
        </form>
    </div>
@endsection
-
