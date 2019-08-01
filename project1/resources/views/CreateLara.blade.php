@extends('layouts.app')

@section('content')
        <div class="container">


            <div class="content">
                <div class="title m-b-md">
                    LARA
                </div>

                <div class="links">
                    <div class="form-inline">
                        {{Form::open(['route'=>'lara.store','method'=>'POST'])}}
                        {{Form::label('name','name:')}}
                        {{Form::text('name','',['class'=>'form-control'])}}
                    </div>  
                    <div class="form-inline">
                        {{Form::label('link','link:')}}
                        {{Form::text('link','link',['class'=>'form-control'])}}
                    </div>  
                    <div class="form-inline">
                        {{Form::label('room','room:')}}
                        {{Form::text('room','room',['class'=>'form-control'])}}
                    </div> 

                    {{Form::submit('Create lara',['class'=>'btn btn-primary'])}}    


                    {{ Form::close() }}

                </div>
            </div>

        </div>

@endsection