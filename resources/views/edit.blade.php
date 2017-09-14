@extends('template')
@section('content')
    <h1>Edit Book</h1>

    {!! Form::model($book, ['action' => ['BookController@update', $book->id], 'method' => 'put', 'files' => true]) !!}

    <div class="col-md-8">
        <div class="col-md-6">
            <div class="form-group">
                <img src="{{ asset('public/img/'.$book->cover) }}" width="250" height="400">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('ISBN', 'ISBN:') !!}
                {!! Form::text('ISBN_10',null,['class'=>'form-control']) !!}
                @if ($errors->has('ISBN_10')) <p class="alert alert-danger">{{ $errors->first('ISBN_10') }}</p> @endif

            </div>
            <div class="form-group">
                {!! Form::label('Title', 'Title:') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
                @if ($errors->has('title')) <p class="alert alert-danger">{{ $errors->first('title') }}</p> @endif

            </div>
            <div class="form-group">
                {!! Form::label('Author', 'Author:') !!}
                {!! Form::text('author',null,['class'=>'form-control']) !!}
                @if ($errors->has('author')) <p class="alert alert-danger">{{ $errors->first('author') }}</p> @endif

            </div>
            <div class="form-group">
                {!! Form::label('Genre', 'Genre:') !!}
                {!! Form::text('genre',null,['class'=>'form-control']) !!}
                @if ($errors->has('genre')) <p class="alert alert-danger">{{ $errors->first('genre') }}</p> @endif

            </div>
            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                {!! Form::submit('Back', ['class' => 'btn btn-default btn pull-right', 'route' => '/']) !!}
            </div>
        </div>


    </div>

    {!! Form::close() !!}

@stop