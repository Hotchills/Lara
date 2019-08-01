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
@endsection