<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Telefonski imenik</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        {!! Html::style('css/main.css') !!}
        {!! Html::script('js/jquery.js') !!}
    </head>
    <body>
        <div class='container' id="wrapper">
            
            <div class='row'>
                <div id="header">
                    <h2><a href="{{ url('/') }}">Personal Phone Book</a></h2>
                </div>
            </div>
            
            <div class='row'>
                <div id="nav">
                    <ul>
                        <li><a href="{{ url('/') }}">Index</a></li>
                        @if(Auth::user())
                            @if(Auth::user()->usertype->name == 'admin')
                                <li><a href='{{ url('admin') }}'>Admin</a></li>
                                <li><a href="{{ url('admin/users') }}">User</a></li>
                                <li><a href='{{ url('address') }}'>Phones</a></li>
                            @elseif(Auth::user()->usertype->name == 'user')
                                <li><a href="{{ url('user') }}">User</a></li>
                                <li><a href="{{ url('address') }}">Phones</a></li>
                            @endif
                        @endif
                        
                        <div class='right-meni'>
                            @if(!Auth::user())
                                <li><a href='{{ url('register') }}'>Register</a></li>
                                <li><a href="{{ url('login') }}">Login</a></li>
                            @else
                                <li><a href='{{ url('logout') }}'>Logout</a></li>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
            
            
            <div id="section">
                
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')

            </div>
            
            <div class='row'>
                <div id="footer">
                    <p>Napravio: Milos Markovic</p>
                </div>
            </div>  
        </div>
         
    </body>
</html>

<script>

$(document).ready(function() {
    
    

    $('#lastName').on('keyup', function (e) {
    
        $(".indexTable tbody tr").remove();

       
        var form = $("form.search");
        var lastName = $(this).val();
        var token = $('form.search input[name=_token]').val();

        //console.log(token);

        var url = form.prop('action');
        //console.log(url);
        
        $.ajax({
            type: "POST",
            url:  url,
            data: {lastName : lastName, _token : token},
            dataType: 'json',
            success: function( addresses ) {
              
             // console.log(addresses);
              
              if(addresses.length > 0){  
                  
                $( addresses ).each(function() {
                    
                      
                        var  tr = "<tr><td>"+this.firstName+"</td>"+
                                         "<td>"+this.lastName+"</td>"+
                                         "<td>"+this.street+"</td>"+
                                         "<td>"+this.city+"</td>"+
                                         "<td>"+this.areaCode+"</td>"+
                                         "<td>"+this.phoneNumber+"</td>"+
                                         "<td><a href='sendEmail/"+this.id+"'>Send email</a></td>"+
                                         "<td><a href='address/"+this.id+"/edit'>Update</a></td>"+
                                         "<td><a href='address/delete"+this.id+"'>Delete</a></td>"+
                                      "</tr>";

                        $(".indexTable tbody").append(tr);
                    
                
                    
                });
                
                }else{
                
                    $(".indexTable tbody").append("<tr><td>No result</td></tr>");
                }
            }
        });
        
    });
});


</script>