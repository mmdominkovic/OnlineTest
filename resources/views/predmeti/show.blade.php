@extends('layouts.app')

@section('content')
    <h1>{{$pred->title}}</h1>
    <small>Objavljeno: {{$pred->created_at}}<br><br>
    <div class="jumbotron">
        {!!$pred->body!!}
    </div>
    <hr>
   
<hr>


    <a href="./" class="btn btn-danger pull-right">Nazad</a> 
@endsection