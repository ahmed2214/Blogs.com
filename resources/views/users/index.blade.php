@extends('layouts.appUser')
@section('title')
    Index
@endsection
@if (session('user') != null)
    @section('userName')
        Wlecome {{ session('user') }}
    @endsection
@endif
@section('content')
    <div class="text-center mt-4">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Posts as $Post)
                <tr>
                    <th scope="row">{{ $Post->id }}</th>
                    <td>{{ $Post->title }}</td>
                    <td>{{ $Post->user ? $Post->user->name : 'Not Found' }}</td> {{-- One to Many (Inverse) / Belongs To relationship   --}}
                    <td>{{ $Post->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('posts.show', $Post->id) }}" class="btn btn-info">Veiw</a>
                        <a href="{{ route('posts.edit', $Post->id) }}" class="btn btn-primary">Edit</a>
                        <form form class="d-inline-block" method="POST" action="{{ route('posts.destroy', $Post->id) }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
