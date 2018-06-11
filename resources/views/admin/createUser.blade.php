@extends('masterPage')


@section('content')

<center>

    <h2>Create User:</h2>

    <form action='{{ route('admins.storeUser') }}' method='POST'>
        {{ csrf_field() }}

        <p>
            <label for='firstName'>First name:</label>
            <input type='text' name='firstName' id='firstName' class='form-control' />
        </p>
        <p>
            <label for='lastName'>Last name:</label>
            <input type='text' name='lastName' id='lastName' class='form-control' />
        </p>
        <p>
            <label for='email'>Email:</label>
            <input type='text' name='email' id='email' class='form-control' />
        </p>
        <p>
            <label for='password'>Password:</label>
            <input type='password' name='password' id='password' class='form-control' />
        </p>
        <p>
            <input type='submit' name='submit' value='Create' class='btn btn-primary' />
        </p>
    </form>

</center>

@stop