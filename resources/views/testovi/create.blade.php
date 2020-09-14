@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'TestoviController@store', 'method' => 'POST']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <?php //dd($questions) ?>
    @if(count($pitanja) > 0)
        <div class="panel-body">
        <?php $i = 1; ?>
        @foreach($pitanja as $pitanje)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Pitanje {{ $i }}.<br />{!! nl2br($pitanje->question_text) !!}</strong>

                     

                        <input
                            type="hidden"
                            name="pitanja[{{ $i }}]"
                            value="{{ $pitanje->id }}">
                    @foreach($pitanje->odgovori as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="odgovori[{{ $pitanje->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        </div>
    @endif
    </div>

    {!! Form::submit(trans('Spremi odgovore'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
