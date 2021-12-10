<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">

        {{-- <h1>{{session('key')}}</h1> --}}
<form method="post" id="myData" action="/add">
    @csrf
<input type="text" name="name"/><br/>
<input type="text" name="fname"/><br/>
<input type="submit" value="Click"/>
    <input type="button" value="Ajax" onclick="datasdataspasspass()"/>
    <h1 id="status"></h1>
</form>
<input type="button" value="show data" onclick="showdata()"/>
                {{-- {{ $detail->id }} --}}
                  @foreach ( $detail as $dt )
                     {{$dt['id']}}
                 @endforeach
{{-- <a href="{{ url('/pelu', [ 'class' => 1 , 'section' => 2  ]) }}">hello</a> --}}
<a href="{{route('student.mydata',[1,2]) }}">hello</a>

<table id="myTable">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>fname</th>
    </tr>
</table>
    </body>
</html>
<script>
    $(document).ready(function () {

        datasdataspasspass = () => {
            $.ajax({
                type: "post",
                url: "{{ url('/show' ) }}",
                data: $("#myData").serialize(),
                dataType: "json",
                beforeSend : function () {
                    $("#status").text("Sending");
                },
                success: function (response) {
                    console.log(response);
                    var row = $('<tr><td>' + response.id + '</td><td>' + response.name + '</td><td>' + response.fname + '</td></tr>');
                     $('#myTable').append(row);
                },
                error : function (err) {
                    console.log(err);
                },
                complete : function () {
                    $("#status").text("Sent");
                },
            });
        }
        showdata = () => {
            $.ajax({
                type: "get",
                url: "{{ url('/showdata' ) }}",
                // data: $("#myData").serialize(),
                dataType: "json",
                beforeSend : function () {
                    $("#status").text("Sending");
                },
                success: function (response) {
                    console.log(response);

                    for (var i=0; i<response.length; i++) {
                                        var row = $('<tr><td>' + response[i].id + '</td><td>' + response[i].name + '</td><td>' + response[i].fname + '</td></tr>');
                                        $('#myTable').append(row);
                                    }
                },
                error : function (err) {
                    console.log(err);
                },
                complete : function () {
                    $("#status").text("Sent");
                },
            });
        }
    });


</script>

