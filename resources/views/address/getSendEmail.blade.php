@extends('masterPage')



@section('content')

<center>
    <h2>Send email:</h2><br>


    <form action="{{ url('sendEmail',$address->id) }}" method='POST'>
        {{ csrf_field() }}
        <p class="form-group">
            <label for='email'>To:</label><br>
            <input type='text' name='email' id='email' value="{{ $address->email }}" class="form-control"/> 
        </p>
        <p class="form-group">
            <label for='subject'>Subject:</label>
            <input type='text' name='subject' for='subject' class="form-control" />
        </p>
        <p class="form-group" style="width:400px;">
            <label for='message'>Message:</label>
            <textarea rows="7" cols="30" name='message' id='message' class="form-control"></textarea>
        </p><br>
        <p>
            <input type='submit' name='submit' value='Send email' class="btn btn-primary" />
        </p>
    </form>
</center>

@stop

