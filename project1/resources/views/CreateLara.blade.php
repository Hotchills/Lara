@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif

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