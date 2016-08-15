@extends('masterPage')



@section('content')

<center>
    <h2>Update admin</h2><br>


    <form action="{{ route('admin.update',$admin->id) }}" method="POST">
        {{ csrf_field() }}
        <p>
            <input name="_method" type="hidden" value="PUT">
        </p>
        <p class="form-group">
            <label for="firstName">First name:</label><br>
            <input type="text" name="firstName" id="firstName" value="{{ $admin->firstName }}" class="form-control" />
        </p>
        <p class="form-group">
            <label for="lastName">Last name:</label><br>
            <input type="text" name="lastName" id="lastName" value="{{ $admin->lastName }}" class="form-control" />
        </p>
        <p class="form-group">
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email" value="{{ $admin->email }}" class="form-control" />
        </p><br>
        <p>
            <input type="submit" name="submit" value="Update admin" class="btn btn-primary" />
        </p>
    </form>
</center>

@stop

