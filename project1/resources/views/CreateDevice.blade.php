@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">


        <div class="content">
            <div class="title m-b-md">
                <h1 class="display-4"> Create new Device :</h1>  
            </div>
            <br>

            <div class="links">
                <div class="form-inline">
                    {{Form::open(['route'=>'device.store','method'=>'POST'])}}
                    {{Form::text('name','devicename',['class'=>'form-control'])}}
                </div>
                <br>

                <div class="form-inline">
                   {{Form::text('type','type',['class'=>'form-control'])}}
                </div> 
                <br>
                {{Form::submit('Create device',['class'=>'btn btn-primary'])}}    

                {{ Form::close() }}

            </div>
        </div>

    </div>
    </div>

    <div class="container">

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Location</th>
                    <th scope="col">#</th>
                    
                </tr>
            </thead>
            <tbody>


                @foreach($devices as $key=>$device)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td class="font-weight-bold"> {{$device->name}}</td>
                    <td > {{$device->type}}</td>
                    <td > {{$device->location}}</td>
                    <td>
                        {{Form::open(['route'=>'device.delete','method'=>'DELETE'])}}
                        {{Form::hidden('deviceID',$device->id)}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}    
                        {{ Form::close() }}
                        
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>

@endsection