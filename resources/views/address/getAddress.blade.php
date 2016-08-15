@extends('masterPage')


@section('content')

<h2>Address:</h2>

@if(count(Auth::user()->address))
    <form action="{{ url('address/search') }}" method="POST" class="search form-inline">
        <p>
            {{ csrf_field() }}
        </p>
        <p style='width:380px;' class='form-group'>
            <label for="lastName">Search phone by Last name:</label>
            <input type="text" name="lastName" id="lastName" class='form-control' />
        </p>
    </form>
@endif

@if(count(Auth::user()->address))
    <table class='table-bordered indexTable'>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Street</th>
                <th>City</th>
                <th>Area code</th>
                <th>Phone number</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Auth::user()->address as $addres)
            <tr>
                <td>{{ ucfirst($addres->firstName) }}</td>
                <td>{{ ucfirst($addres->lastName) }}</td>
                <td>{{ ucfirst($addres->street) }}</td>
                <td>{{ ucfirst($addres->city) }}</td>
                <td>{{ $addres->areaCode }}</td>
                <td>{{ $addres->phoneNumber }}</td>
                <td><a href="{{ url('sendEmail',$addres->id) }}">Send email</a></td>
                <td><a href="{{ route('address.edit',$addres->id) }}">Update</a></td>
                <td><a href="{{ route('address.delete',$addres->id) }}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h3>Insert new addres</h3>
@endif<br>

<a class='btn btn-primary' href='{{ url('address/create') }}'>New address</a>

@stop

