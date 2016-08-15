@extends('masterPage')


@section('content')


<h2>Users:</h2><br>

@if(count($users))
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ ucfirst($user->firstName) }}</td>
                <td>{{ ucfirst($user->lastName) }}</td>
                <td>{{ $user->email }}</td>
                <td><a href='{{ route('editAdminUser',$user->id) }}'>Update</a></td>
                <td><a href='{{ route('deleteAdminUser',$user->id) }}'>Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h3>Insert new user</h3>
@endif<br>

<a href="{{ url('admin/user/create') }}" class="btn btn-primary" >New user</a>

@stop
