@extends('layouts.app')

@section('content')
@if(!Auth::guest())
        @if ((auth()->user()->role == 'Profesor'))
    <h1>Lista Korisnika</h1>
    <br>
   
         <p>   <a href="users/create" class="btn btn-success">Novi korisnik</a>
      </p>
      
    <div class="panel panel-default">
        <div class="panel-heading">
           Popis
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Email</th>
                        <th>Uloga</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
    @foreach ($users as $u)
    <tr data-entry-id="{{ $u->id }}">
                                <td>{{ $u->name }} <br>         <small>Created at {{$u->created_at}}</small>
</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->role }}</td>
                                <td>
                                    <a href="{{ route('users.show',[$u->id]) }}" class="btn btn-xs btn-primary">Pregled</a>
             
        @if(!Auth::guest())
        @if ((auth()->user()->role == 'Profesor'))
                {!!Form::open(['action' => ['UserController@destroy', $u->id], 'method' =>'POST', 'class' => 'btn btn-xs btn-danger'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Izbriši', ['class' => 'btn btn-xs btn-danger'])}}
                {!!Form::close()!!}
                <a href="{{ route('users.edit',[$u->id]) }}" class="btn btn-xs btn-info">Uredi</a>
        @endif
        @endif
            </div> 
        @endforeach
    <br>
    <div class="row justify-content-center">
        {{$users->links()}}
    </div>
    @endif
    @endif
@endsection
