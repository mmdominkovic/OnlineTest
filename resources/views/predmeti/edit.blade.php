@extends('layouts.app')

@section('content')
    <h1>Ažuriranje predmeta</h1>
    
    {!! Form::open(['action' => ['PredmetiController@update', $pred->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title', $pred->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('ects','ECTS')}}
            {{Form::text('ects', $pred->ects,['class' => 'form-control', 'placeholder' => 'ECTS'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body', $pred->body,['id' =>'editor1','class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection