<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}" >
    </head>
    <style>
        body {
            padding: 5em;
        }
    </style>
<body>

    <form action="{{ action('UsersController@login') }}" method="post">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" value="{{ Input::old('username') }}">
                @if ($errors->has('username')) <p class="alert alert-danger">{{ $errors->first('username') }}</p> @endif
                @if ($errors->has('exists')) <p class="alert alert-danger">{{ $errors->first('exists') }}</p> @endif
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                @if ($errors->has('password')) <p class="alert alert-danger">{{ $errors->first('password') }}</p> @endif
            </div>

            <div class="form-group">
                <label>Repeat password</label>
                <input type="password" class="form-control" name="password2" placeholder="Repeat password">
                @if ($errors->has('password2')) <p class="alert alert-danger">{{ $errors->first('password2') }}</p> @endif
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</body>
</html>
