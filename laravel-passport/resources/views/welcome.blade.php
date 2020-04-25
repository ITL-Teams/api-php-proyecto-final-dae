@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title1 m-b-md">
            Bienvenido a {{ config('app.name') }}
        </div>
            
        <center><img src="{{ asset('img/team-logo.png') }}"  height="250px"></center>
        <center>desarrollado por <b>Bug Developers</b></center>
        <br><br>
    </div>
@endsection