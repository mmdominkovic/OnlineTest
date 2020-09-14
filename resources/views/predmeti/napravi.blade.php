@extends('layouts.app')

@section('content')
    <h1>Napravi objavu</h1>
    
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Naslov')}}
            {{Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Naslov'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Tekst')}}
            {{Form::textarea('body', '',['id' =>'editor1','class' => 'form-control', 'placeholder' => 'Unesite tekst'])}}
        </div>
        
        {!!Form::hidden('predmet_id', $pred->id)!!}
        {{Form::submit('Napravi', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection