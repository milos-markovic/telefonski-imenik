@extends('masterPage')


@section('content')

<center>
    
    <h2>Update user:</h2><br>

    <form action='{{ route('updateAdminUser',$user->id) }}' method='POST'>
        {{ csrf_field() }}
        <p class='form-group'>
            <label for='firstName'>First name:</label>
            <input type='text' name='firstName' id='firstName' value='{{ $user->firstName }}' class='form-control' />
        </p>
        <p class='form-group'>
            <label for='lastName'>Last name:</label>
            <input type='text' name='lastName' id='lastName' value='{{ $user->lastName }}' class='form-control' />
        </p>
        <p class='form-group'>
            <label for='email'>Email:</label>
            <input type='text' name='email' id='email' value='{{ $user->email }}' class='form-control' />
        </p>
        <p>
            <input type='submit' name='submit' value='Update user' class='btn btn-primary' />
        </p>
    </form>

</center>

@stop

