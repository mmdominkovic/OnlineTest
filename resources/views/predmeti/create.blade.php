@extends('layouts.app')

@section('content')
    <h1>Novi predmet</h1>
    <div style="max-width:80%">
    {!! Form::open(['action' => 'PredmetiController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Naslov')}}
            {{Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Naslov'])}}
        </div>
        <div class="form-group">
            {{Form::label('ects','ECTS bodovi')}}
            {{Form::text('ects', '',['class' => 'form-control', 'placeholder' => 'ECTS bodovi'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Tekst')}}
            {{Form::textarea('body', '',['id' =>'editor1','class' => 'form-control', 'placeholder' => 'Tekst'])}}
        </div>
        {{Form::submit('Napravi', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
    </div>
@endsection