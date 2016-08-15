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
                @if(!Auth::user())
                <td><a href='{{ route('admin.edit',$admin->id) }}'>Update</a></td>
                <td><a href="{{ route('admin.delete',$admin->id) }}">Delete</a></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h3>Insert new admin</h3>
@endif<br>

<a href="{{ url('admin/create') }}" class="btn btn-primary" >New admin</a>

@stop

