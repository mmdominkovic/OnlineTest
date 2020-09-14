@extends('layouts.app')

@section('content')
<h1>Napravi odgovor</h1>   
{!! Form::open(['action' => 'OdgovoriController@store', 'method' => 'POST']) !!}

    <div class="panel panel-default">
       
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pitanje_id', 'Pitanje*', ['class' => 'control-label']) !!}
                    {!! Form::select('pitanje_id', $pitanja, old('pitanje_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pitanje_id'))
                        <p class="help-block">
                            {{ $errors->first('pitanje_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option', 'Odgovor*', ['class' => 'control-label']) !!}
                    {!! Form::text('option', old('option'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option'))
                        <p class="help-block">
                            {{ $errors->first('option') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct', 'Correct', ['class' => 'control-label']) !!}
                    {!! Form::hidden('correct', 0) !!}
                    {!! Form::checkbox('correct', 1, 0, ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct'))
                        <p class="help-block">
                            {{ $errors->first('correct') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

