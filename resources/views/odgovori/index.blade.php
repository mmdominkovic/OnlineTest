@extends('layouts.app')

@section('content')
<h1>Lista Odgovora</h1>
@if(!Auth::guest())
        @if ((auth()->user()->role == 'Profesor' ))
           <p>
            <a href="odgovori/create" class="btn btn-success">Novi odgovor</a>
       </p>
        @endif
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
          Popis
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($odgovori) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Pitanje</th>
                        <th>Odgovor</th>
                        <th>Točan</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

 
                <tbody>
                        @foreach ($odgovori as $o)
                            <tr data-entry-id="{{ $o->id }}">
                                <td>{{ $o->pitanja->question_text}}</td>
                                <td>{{ $o->option }}</td>
                                <td>{{ $o->correct == 1 ? 'Da' : 'Ne' }}</td>
                                <td>

                                    <a href="{{ route('odgovori.show',[$o->id]) }}" class="btn btn-xs btn-primary">Pregled</a>
     @if(!Auth::guest())
        @if ((auth()->user()->role == 'Profesor'))
                {!!Form::open(['action' => ['OdgovoriController@destroy', $o->id], 'method' =>'POST', 'class' => 'btn btn-xs btn-danger'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Izbriši', ['class' => 'btn btn-xs btn-danger'])}}
                {!!Form::close()!!}
                <a href="{{ route('odgovori.edit',[$o->id]) }}" class="btn btn-xs btn-info">Uredi</a>
                </td>

                </tr>

        @endif
        @endif
                        @endforeach
                   
                   
                        </tbody>
            </table>
        </div>
    </div>
@endsection

















