@extends('masterPage')


@section('content')


<h2>Update address:</h2><br>

<form action='{{ route('address.update',$address->id) }}' method='POST'>
     {{ csrf_field() }}
    <p>
    <input type='hidden' name='_method' value='PUT' />
    </p>
    <p class="form-group">
        <label for="firstName">First name:</label><br>
        <input type="text" name="firstName" id="firstName" value='{{ $address->firstName }}' class="form-control" />
    </p>
    <p class="form-group">
        <label for="lastName">Last name:</label><br>
        <input type="text" name="lastName" id="lastName" value='{{ $address->lastName }}' class="form-control" />
    </p>
    <p class="form-group">
        <label for="street">Street:</label><br>
        <input type="text" name="street" id="street" value='{{ $address->street }}' class="form-control" />
    </p>
    <p class="form-group">
        <label for="city">City:</label><br>
        <input type="text" name="city" id="city" value='{{ $address->city }}' class="form-control" />
    </p>
    <p class="form-group">
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" value="{{ $address->email }}" class="form-control" />
    </p>
    <p class="form-group">
        <fieldset>
            <legend>Telephon:</legend>
                <p class="form-group">
                    <label for="areaCode">Area code:</label>
                    <input style='width:60px;' type="text" name="areaCode" id="areaCode" value='{{ $address->areaCode }}' class="form-control"  />  
                </p>
                <p class="form-group">
                    <label for="phoneNumber">Phone number:</label>
                    <input style="width:130px;" type="text" name="phoneNumber" id="phoneNumber" value='{{ $address->phoneNumber }}' class="form-control" />
                </p>
        </fieldset>
    </p><br>
    <p>
        <input type='submit' name='submit' value='Update address' class="btn btn-primary" />
    </p>
</form>


@stop

