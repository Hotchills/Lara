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

                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">link</th>
                                <th scope="col">adress</th>
                                <th scope="col">servername</th>
                                <th scope="col">location</th>
                                <th scope="col">duration</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($laras as $key=>$lara)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$lara->name}}</td>
                                <td>{{$lara->link}}</td>
                                <td>{{$lara->adress}}</td>
                                <td>{{$lara->servername}}</td>
                                <td>{{$lara->location}}</td>
                                <td>{{$lara->duration}}</td>   
                            </tr>
                      @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

@endsection
