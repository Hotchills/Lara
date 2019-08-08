@extends('layouts.app')

@section('content')

<div class="container">
    <div class="content" Style="width: 110%;">
        <div class="alert alert-danger" Style="display: none;">

        </div>
        <div class="links">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                     
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Time of booking</th>
                        <th scope="col">Ticket ID</th>
                        <th scope="col">Server Name</th>
                        <th scope="col">Location</th>                    
                        <th scope="col">#</th>
              

                    </tr>
                </thead>
                <tbody>
              

                    @foreach($devices as $key=>$device)


                    <tr>             
                        <td class="font-weight-bold"> {{$device->name}}</td>
                        <td class="font-weight-bold"> {{$device->type}}</td>


                        @if($device->servername == '0')     

                        <td>
                            <div class="input-group ">
                                <input id="adress{{$device->id}}" type="text" class="form-control form-control-sm" placeholder="Ticket ID" aria-label="Ticket ID" >
                            </div>
                        </td>
                        <td>
                            <div class="input-group ">
                                <input id="name{{$device->id}}" type="text" class="form-control form-control-sm" placeholder="Server name" aria-label="Server name" >
                            </div>
                        </td>
                        <td>
                            <div class="input-group ">
                                <input  id="location{{$device->id}}" type="text" class="form-control form-control-sm" placeholder="Server location" aria-label="Server location" >
                            </div>
                        </td>
                        <td>
                          <div class="input-group ">
                                <input  type="text" class="form-control form-control-sm" placeholder="Time" aria-label="Time" >
                            </div>
                        </td>

                        <td>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary savebutton btn-sm" type="button" id="{{$device->id}}">Book</button>
                            </div>
                        </td>
                        
                        @else   


                        @if($device->adress!='0')<td><a href="https://jira.godaddy.com/browse/{{$device->adress}}" target="_blank">{{$device->adress}}</a></td> @else <td> N/A </td> @endif
                        @if($device->servername!='0') <td>{{$device->servername}}</td> @else <td> N/A</td> @endif
                        @if($device->location != '0') <td>{{$device->location}}</td>@else<td>N/A</td>@endif
                        @if($device->time != $device->created_at) <td>{{$device->time}}</td>@else<td>N/A</td>@endif 
                        <td><div class="input-group-append">
                                <button class="btn  btn-outline-success clearbutton btn-sm" id="clear{{$device->id}}" type="button">Free</button>
                            </div> </td> 
                        @endif  

                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $(".clearbutton").click(function () {
            var deviceID = $(this).attr("id");
            deviceID = deviceID.slice(5);
            var adress = 0;
            var name = 0;
            var location = 0;

            console.log(deviceID);
            console.log(adress);
            console.log(name);
            console.log(location);

            $.ajax({
                method: "POST",
                url: 'http://10.81.5.232/UpdateDevice',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {deviceID: deviceID, adress: adress, name: name, location: location}
            })
                    .done(function (data) {
                        console.log(data.message);
                        console.log(data['message']);
                        window.location.reload();
                    })
                    .fail(function (data) {
                        console.log(data.message);
                        console.log(data);
                        window.location.reload();
                    });
        });



        $(".savebutton").click(function () {

            var deviceID = $(this).attr("id");
            var adress = $('#adress' + deviceID).val();
            if (!adress) {
                jQuery('.alert-danger').show();
                jQuery('.alert-danger').append('<p> Please don`t forget the ticket number </p>');
                return;
            }
            
            var name = $('#name' + deviceID).val();
            if (!name) {
                jQuery('.alert-danger').show();
                jQuery('.alert-danger').append('<p> Please add name</p>');
                return;
            }
            var location = $('#location' + deviceID).val();
            if (!location) {

                jQuery('.alert-danger').show();
                jQuery('.alert-danger').append('<p> Please add location</p>');
                return;
            }

            console.log(deviceID);
            console.log(adress);
            console.log(name);
            console.log(location);

            $.ajax({
                method: "POST",
                url: 'http://10.81.5.232/UpdateDevice',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {deviceID: deviceID, adress: adress, name: name, location: location}
            })
                    .done(function (data) {

                        console.log(data.message);
                        console.log(data['message']);
                        window.location.reload();
                    })
                    .fail(function (data) {
                        console.log(data.errors);
                        console.log('fail');
                        window.location.reload();
                    });
        });
    });

</script>
@endsection
