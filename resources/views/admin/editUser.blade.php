@extends('masterPage')


@section('content')

<center>
    
    <h2>Update User:</h2><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
    <form action='{{ route('admins.updateUser',$user->id) }}' method='POST'>
        {{ csrf_field() }}

        <p>
            <label for='firstName'>First name:</label>
            <input type='text' name='firstName' id='firstName' value='{{ $user->firstName }}' class='form-control' />
        </p>
        <p>
            <label for='lastName'>Last name:</label>
            <input type='text' name='lastName' id='lastName' value='{{ $user->lastName }}' class='form-control' />
        </p>
        <p>
            <label for='email'>Email:</label>
            <input type='text' name='email' id='email' value='{{ $user->email }}' class="form-control" />
        </p>
        <p>
            <label for='password'>Password:</label>
            <input type='text' name='password' id='password' value='{{ $user->password }}' class='form-control' />
        </p>
        <p>
            <input type='submit' name='submit' value='Update' class='btn btn-primary' />
        </p>
    </form>
    
</center>

@stop