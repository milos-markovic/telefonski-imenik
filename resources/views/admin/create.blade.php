@extends('masterPage')


@section('content')

<center>
    <h2>New admin</h2><br>

    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
    <form action='{{ route('admins.store') }}' method='POST'>
        {{ csrf_field() }}
        <p class="form-group">
            <label for='firstName'>First name:</label><br>
            <input type='text' name='firstName' id='firstName' class="form-control" />
        </p>
        <p class="form-group">
            <label for='lastName'>Last name:</label><br>
            <input type='text' name='lastName' id='lastName' class="form-control" />
        </p>
        <p class="form-group">
            <label for='email'>Email:</label><br>
            <input type='text' name='email' id='email' class="form-control" />
        </p>
        <p class="form-group">
            <label for='password'>Password:</label><br>
            <input type='password' name='password' id='password' class="form-control" />
        </p><br>
        <p>
            <input type='submit' name='submit' value='New admin' class="btn btn-primary" />
        </p>
    </form>
</center>


@stop

