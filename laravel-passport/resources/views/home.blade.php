@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/style.css')}}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
                <div class="card-header" style="display: none">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="cuerpo">
                        <center><img src="{{asset('css/BD-Bug.jpg')}}"></center>
                        <br>
                        <center><p><b>¡Bien benido!</b></p></center>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
