@extends('template')

@section('content')
    <h1>Book Store</h1>
    <a href="{{url('create')}}" class="btn btn-success">Create Book</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Thumbs</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->ISBN_10 }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->genre }}</td>
                <td><img src="{{ asset('public/img/'.$book->cover) }}" alt="" style="width:35px;height:30px;"></td>
                <td><a href="{{action('BookController@edit', $book->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action'=>['BookController@destroy', $book->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection