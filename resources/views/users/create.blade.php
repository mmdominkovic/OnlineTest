@extends('layouts.app')

@section('content')
    <h1>Novi korisnik</h1>
    <div style="max-width:80%">
    {!! Form::open(['action' => 'UserController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Ime')}}
            {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Ime'])}}
        </div>
        <div class="form-group">
            {{Form::label('lastname','Prezime')}}
            {{Form::text('lastname', '',['class' => 'form-control', 'placeholder' => 'Prezime'])}}
        </div>
        <div class="form-group">
            {{Form::label('username','Korisničko ime')}}
            {{Form::text('username', '',['class' => 'form-control', 'placeholder' => 'Korisničko ime'])}}
        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email', '',['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('password','Lozinka')}}
            {{Form::text('password', '',['class' => 'form-control', 'placeholder' => 'Lozinka'])}}
        </div>
        <div class="form-group">
        {{Form::label('role','Uloga',['class'=>'control-label'])}}
        {{Form::select('role', $choose_role,['class' => 'form-control'])}}
        </div>
      
        {{Form::submit('Napravi', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
    </div>
@endsection