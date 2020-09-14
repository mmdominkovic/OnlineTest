@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>Ovo je aplikacija za Online testove</p>
        @if(Auth::guest())
        <p>
            <a class="btn btn-primary" href="login" role="button">Login</a> 
        </p>
        @endif
    </div>    
@endsection

 