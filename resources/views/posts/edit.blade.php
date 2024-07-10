@extends('layouts.appUser')
@section('title')
    Edite
@endsection
@if (session('user') != null)
    @section('userName')
        Wlecome {{ session('user') }}
    @endsection
@endif
@section('content')
    <div class=" mt-4">
        <form method="post" action="{{ route('posts.update', $post->id) }}">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="exampleFormControlInput1">Post Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Post Title" name="PostTitle"
                value="{{ $post->title }}">



            <label for="exampleFormControlTextarea1">Post Descrption</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descrption">{{ $post->descrption }}</textarea>


            <label for="exampleFormControlSelect1">Post Creator</label>
            <select class="form-control" id="exampleFormControlSelect1" name="postCreator">
                @if (session('user') == null)
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                @else
                    <option value="{{ session('id') }}">{{ session('user') }}</option>
                @endif
            </select>
            <button type="submit" class="btn btn-info mt-4">Update Post</button>
        </form>
    </div>
@endsection