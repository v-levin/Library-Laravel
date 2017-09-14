@extends('template')
@section('content')
    <h1>Create Book</h1>

    {!! Form::open(array('action' => 'BookController@store', 'files' => true, 'method' => 'post')) !!}
    <div class="col-md-12">
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
                {!! Form::label('Cover') !!}
                {!! Form::file('cover', null) !!}
                @if ($errors->has('cover')) <p class="alert alert-danger">{{ $errors->first('cover') }}</p> @endif

            </div>

            <div class="form-group pull-right">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>

        </div>


    </div>



    {!! Form::close() !!}
@stop