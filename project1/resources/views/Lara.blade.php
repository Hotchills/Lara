@extends('layouts.app')

@section('content')

<div class="container">
    <div class="content" Style="width: 110%;">
                    <div class="alert alert-danger" Style="display: none;">

            </div>
        <div class="title m-b-md">
            LARA
        </div>

        <div class="links">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">link</th>
                        <th scope="col">Ticket</th>
                        <th scope="col">Servername</th>
                        <th scope="col">Location</th>
                        <th scope="col">Duration</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laras as $key=>$lara)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$lara->name}}</td>
                        <td><a href="{{$lara->link}}" target="_blank">{{$lara->link}}</a></td>

                        @if($lara->adress == '0' && $lara->servername == '0' && $lara->location == '0' && $lara->duration == '0')     

                        <td>
                            <div class="input-group mb-3">
                                <input id="adress{{$lara->id}}" type="text" class="form-control" placeholder="DCSXB adress" aria-label="DCSXB adress" aria-describedby="button-addon1">
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">
                                <input id="name{{$lara->id}}" type="text" class="form-control" placeholder="Server name" aria-label="Server name" aria-describedby="button-addon1">
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">
                                <input  id="location{{$lara->id}}" type="text" class="form-control" placeholder="Server location" aria-label="Server location" aria-describedby="button-addon1">
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">

                                <select id="duration{{$lara->id}}" class="custom-select btn-sm" id="inputGroupSelect{{$lara->id}}" aria-label="Selector">
                                    <option selected>Choose...</option>
                                    <option value="0.1">10min</option>
                                    <option value="1">1h</option>
                                    <option value="2">2h</option>
                                    <option value="6">6h</option>
                                    <option value="24">24h</option>
                                </select>

                            </div>

                        </td>
                        <td>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary savebutton btn-sm" type="button" id="{{$lara->id}}">Save</button>
                            </div>
                        </td>
                        @else
                        @if($lara->adress!='0')
                        <td><a href="https://jira.godaddy.com/browse/{{$lara->adress}}" target="_blank">{{$lara->adress}}</a></td>

                        @else
                        <td> N/A </td>
                        @endif

                        @if($lara->servername!='0') <td>{{$lara->servername}}</td>

                        @else
                        <td> N/A
                        </td>
                        @endif


                        @if($lara->location != '0') <td>{{$lara->location}}</td>

                        @else
                        <td>N/A

                        </td>
                        @endif

                        @if( $lara->duration() < ($lara->duration * 60)) <td>

                            <div class="input-group-append">
                                <p class="btn  btn-outline-danger btn-sm" >{{$lara->duration()}}min from {{$lara->duration}}h</p>
                            </div>
                        </td>
                        @else
                        <td> 
                            <div class="input-group-append">
                                <button class="btn  btn-outline-success btn-sm" >FREE </button>
                            </div>
                        </td>
                        @endif
                        <td >
                            <div class="input-group-append">
                                <button class="btn  btn-outline-danger clearbutton btn-sm" id="clear{{$lara->id}}" type="button">Free</button>
                            </div>
                        </td>
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
            var laraID = $(this).attr("id");
            laraID = laraID.slice(5);
            var adress = 0;
            var name = 0;
            var location = 0;
            var duration = 0;

            console.log(laraID);
            console.log(adress);
            console.log(name);
            console.log(location);
            console.log(duration);

            $.ajax({
                method: "POST",
                url: 'http://10.81.5.232/UpdateLara',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {laraID: laraID, adress: adress, name: name, location: location, duration: duration}
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
         
            var laraID = $(this).attr("id");
            var adress = $('#adress' + laraID).val();
            if (!adress) {                
               	jQuery('.alert-danger').show();
                jQuery('.alert-danger').append('<p> Please don`t forget the ticket number </p>');
                return;		
            }
            var name = $('#name' + laraID).val();
            if (!name) {
                name = 0;
            }
            var location = $('#location' + laraID).val();
            if (!location) {
               
                jQuery('.alert-danger').show();
                jQuery('.alert-danger').append('<p> Please add location</p>');
                return;	
            }
            var duration = $('#duration' + laraID).val();
            if (duration == 'Choose...') {
                duration=2;
            }
            console.log(laraID);
            console.log(adress);
            console.log(name);
            console.log(location);
            console.log(duration);

            $.ajax({
                method: "POST",
                url: 'http://10.81.5.232/UpdateLara',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {laraID: laraID, adress: adress, name: name, location: location, duration: duration}
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
