@extends('masterPage')


@section('content')

<h2>New Address:</h2><br>

@include('errors.validationErrors')

<form action='{{ route('address.store') }}' method='POST'>
    {{ csrf_field() }}
    <p class="form-group">
        <label for="firstName">First name:</label><br>
        <input type="text" name="firstName" id="firstName" class="form-control" />
    </p>
    <p class="form-group">
        <label for="lastName">Last name:</label><br>
        <input type="text" name="lastName" id="lastName" class="form-control" />
    </p>
    <p class="form-group">
        <label for="street">Street:</label><br>
        <input type="text" name="street" id="street" class="form-control" />
    </p>
    <p class="form-group">
        <label for="city">City:</label><br>
        <input type="text" name="city" id="city" class="form-control" />
    </p>
    <p class="form-group">
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" class="form-control" />
    </p>
    <p class="form-group">
        <fieldset>
            <legend>Telephon:</legend>
                <p class="form-group">
                    <label for="areaCode">Area code:</label>
                    <input style='width:60px;' type="text" name="areaCode" id="areaCode"  class="form-control"  />  
                </p>
                <p class="form-group">
                    <label for="phoneNumber">Phone number:</label>
                    <input style="width:130px;" type="text" name="phoneNumber" id="phoneNumber"  class="form-control" />
                </p>
        </fieldset>
    </p><br>
    <p>
        <input type='submit' name='submit' value='New address' class='btn btn-primary' />
    </p>
</form>


@stop

