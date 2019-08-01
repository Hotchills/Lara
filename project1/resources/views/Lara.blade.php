@extends('layouts.app')

@section('content')

<div class="container">
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
                        <td><a href="{{$lara->link}}">{{$lara->name}}</a></td>
                        <td><a href="{{$lara->link}}">{{$lara->link}}</a></td>

                        @if($lara->adress == '0' && $lara->servername == '0' && $lara->location == '0' && lara->duration == '0')     

                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="DCSXB link" aria-label="DCSXB link" aria-describedby="button-addon1">
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Server name" aria-label="Server name" aria-describedby="button-addon1">
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Server location" aria-label="Server location" aria-describedby="button-addon1">
                            </div>
                        </td>
                        </td>
                <div class="input-group mb-3">

                    <select class="custom-select" id="inputGroupSelect04" aria-label="Selector">
                        <option selected>Choose...</option>
                        <option value="1">30 min</option>
                        <option value="2">1h</option>
                        <option value="3">2h</option>
                        <option value="4">6h</option>
                        <option value="5">24h</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Button</button>
                    </div>

                </div>

                </td>
                @else
                @if($lara->adress!='0')
                <td><a href="https://jira.godaddy.com/browse/{{$lara->adress}}">{{$lara->adress}}</a></td>

                @else
                <td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="DCSXB link" aria-label="DCSXB link" aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">Button</button>
                        </div>
                    </div>
                </td>
                @endif

                @if($lara->servername!='0') <td>{{$lara->servername}}</td>

                @else
                <td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Server name" aria-label="Server name" aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">Button</button>
                        </div>
                    </div>
                </td>
                @endif


                @if($lara->location != '0') <td>{{$lara->location}}</td>

                @else
                <td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Server location" aria-label="Server location" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                        </div>
                    </div>
                </td>
                @endif

                @if($lara->duration!='0') <td>{{$lara->duration}}</td>
                @else
                <td>
                    <div class="input-group mb-3">

                        <select class="custom-select" id="inputGroupSelect04" aria-label="Selector">
                            <option selected>Choose...</option>
                            <option value="1">30 min</option>
                            <option value="2">1h</option>
                            <option value="3">2h</option>
                            <option value="4">6h</option>
                            <option value="5">24h</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Button</button>
                        </div>

                    </div>
                </td>
                @endif
                @endif
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
