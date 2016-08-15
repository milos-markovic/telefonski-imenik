@extends('masterPage')


@section('content')

<h2>User</h2><br>

<table class='table table-bordered'>
    <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->firstName }}</td>
            <td>{{ $user->lastName }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    </tbody>
</table>


@stop

