@extends('layouts.app')

@section('content')
    <h1>Ažuriranje pitanja</h1>
    
    {!! Form::open(['action' => ['PitanjaController@update', $pitanje->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('predmet_id','Predmet*',['class' => 'control-label'])}}
            {{Form::select('predmet_id', $predmeti,old('predmet_id'),['class' => 'form-control'])}}
        </div>
        <div class="form-group">
        {!! Form::label('question_text', 'Tekst pitanja*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('question_text', old('question_text'), ['class' => 'form-control ', 'placeholder' => '']) !!}
            </div>
     
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection