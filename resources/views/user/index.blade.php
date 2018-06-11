@extends('masterPage')


@section('content')


<h2>Users:</h2><br>

@if(count($user))
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
                <td>{{ ucfirst($user->firstName) }}</td>
                <td>{{ ucfirst($user->lastName) }}</td>
                <td>{{ $user->email }}</td>
            </tr>
    </table>
@endif

@stop
