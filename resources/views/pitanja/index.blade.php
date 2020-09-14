@extends('layouts.app')

@section('content')
<h1>Lista Pitanja</h1>

@if(!Auth::guest())
        @if ((auth()->user()->role == 'Profesor' ))
        <p>    <a href="pitanja/create" class="btn btn-success">Novo pitanje</a>
       
       </p>
        @endif
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
           Popis
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($pitanja) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Predmet</th>
                        <th>Tekst pitanja</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>

                <tbody>
@foreach ($pitanja as $p)
<tr data-entry-id="{{ $p->id }}">
                                <td>{{ $p->predmet->title}} <br>     
                                <small>Written on: {{$p->created_at}}</small>
                                </td>
                                <td>{!! $p->question_text !!}</td>
                                <td>
                                    <a href="{{ route('pitanja.show',[$p->id]) }}" class="btn btn-xs btn-primary">Pregled</a>
                                   

    
    @if(!Auth::guest())
        @if ((auth()->user()->role == 'Profesor'))
                {!!Form::open(['action' => ['PitanjaController@destroy', $p->id], 'method' =>'POST', 'class' => 'btn btn-xs btn-danger'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Izbriši', ['class' => 'btn btn-xs btn-danger'])}}
                {!!Form::close()!!}
                <a href="pitanja/{{$p->id}}/edit" class="btn btn-xs btn-info">Uredi</a>

        @endif
        @endif
            </div> 
        @endforeach
        <br>
   

   
@endsection