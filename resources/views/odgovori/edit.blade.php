@extends('layouts.app')

@section('content')
    <h1>Ažuriranje odgovora</h1>
    
    {!! Form::open(['action' => ['OdgovoriController@update', $odgovori->id], 'method' => 'POST']) !!}
        <div class="form-group">
        {!! Form::label('pitanje_id', 'Pitanje*', ['class' => 'control-label']) !!}
        {{Form::select('pitanje_id', $pitanja,old('pitanje_id'),['class' => 'form-control'])}}
                        </div>
        <div class="form-group">
        {!! Form::label('option', 'Odgovor*', ['class' => 'control-label']) !!}
                    {!! Form::text('option', old('option'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
     <div>
     {!! Form::label('correct', 'Točan', ['class' => 'control-label']) !!}
                    {!! Form::hidden('correct', 0) !!}
                    {!! Form::checkbox('correct', 1, old('correct', 0), ['class' => 'form-control']) !!}
              
     </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection