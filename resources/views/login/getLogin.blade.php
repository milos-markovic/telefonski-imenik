@extends('masterPage')


@section('content')

<center>
    <h2>Login</h2><br>

    @include('errors.validationErrors')
    
    <form action='{{ url('login') }}' method='POST'>
        {{ csrf_field() }}
        <p class='form-group'>
            <label for='email'>Email:</label><br>
            <input type='text' name='email' id='email' class='form-control' />
        </p>
        <p class='form-group'>
            <label for='password'>Password:</label><br>
            <input type='password' name='password' id='password' class='form-control' />
        </p><br>
        <p>
            <input type='submit' name='submit' value='Login' class='btn btn-primary' />
        </p>
    </form>
</center>
    
@stop

