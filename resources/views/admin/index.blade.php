@extends('masterPage')


@section('content')


<h2>Admin users:</h2><br>

@if(count($admins))
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
            <tr>
                <td>{{ ucfirst($admin->firstName) }}</td>
                <td>{{ ucfirst($admin->lastName) }}</td>
                <td>{{ $admin->email }}</td>
                <td><a href='{{ route('admins.edit',$admin->id) }}'>Update</a></td>
                <td><a href='{{ route('admins.destroy',$admin->id) }}'>Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h3>Insert new admin</h3>
@endif<br>

<a href="{{ route('admins.create') }}" class="btn btn-primary" >New admin</a>

@stop

