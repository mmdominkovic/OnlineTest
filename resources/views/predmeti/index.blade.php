@extends('layouts.app')

@section('content')
    <h1 class="page-title">Lista predmeta</h1>
    
    @if(!Auth::guest())
        @if ((auth()->user()->role == 'Profesor' ))
           <p> <a href="predmeti/create" class="btn btn-success">Novi predmet</a>
       </p>
        @endif
    @endif
    
    <div class="panel panel-default">
        <div class="panel-heading">
           Popis
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($pred) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>

    @foreach ($pred as $p)
    <tr data-entry-id="{{ $p->id }}">
                                <td>{{ $p->title }} <br>
                                <small>
                                Written on: {{$p->created_at}}</small></td>
                                <td>
                                <a href="{{ route('predmeti.show',[$p->id]) }}" class="btn btn-xs btn-primary">@lang('Pregled')</a>
        @if(!Auth::guest())
        @if ((auth()->user()->role == 'Profesor'))
                {!!Form::open(['action' => ['PredmetiController@destroy', $p->id], 'method' =>'POST', 'class' => 'btn btn-xs btn-danger'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Izbriši', ['class' => 'btn btn-xs btn-danger'])}}
                {!!Form::close()!!}
                <a href="{{ route('predmeti.edit',[$p->id]) }}" class="btn btn-xs btn-info">@lang('Uredi')</a>

        @endif
        @endif
            </div> 
        @endforeach
    <br>
    <div class="row justify-content-center">
        {{$pred->links()}}
    </div>
   
@endsection
