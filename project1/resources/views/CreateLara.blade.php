@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">


        <div class="content">
            <div class="title m-b-md">
                <h1 class="display-4"> Create new LARA :</h1>  
            </div>
            <br>

            <div class="links">
                <div class="form-inline">
                    {{Form::open(['route'=>'lara.store','method'=>'POST'])}}
                    {{Form::text('name','name',['class'=>'form-control'])}}
                </div>
                <br>
                <div class="form-inline">

                    {{Form::text('link','link',['class'=>'form-control'])}}
                </div>  
                <br>
                <div class="form-inline">

                    {{Form::text('room','room',['class'=>'form-control'])}}
                </div> 
                <br>
                {{Form::submit('Create lara',['class'=>'btn btn-primary'])}}    


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
                    <th scope="col">Room</th>
                    <th scope="col">link</th>
                    <th scope="col">#</th>
                    
                </tr>
            </thead>
            <tbody>


                @foreach($laras as $key=>$lara)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td class="font-weight-bold"> {{$lara->name}}</td>
                    <td > {{$lara->room}}</td>
                    <td><a href="{{$lara->link}}" target="_blank">{{$lara->link}}</a></td>
                    <td>
                        {{Form::open(['route'=>'lara.delete','method'=>'DELETE'])}}
                        {{Form::hidden('laraID',$lara->id)}}
                                      {{Form::submit('Delete',['class'=>'btn btn-danger'])}}    
                         {{ Form::close() }}
                        
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>

@endsection