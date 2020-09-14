@extends('layouts.app')

@section('content')
<h1>Ažuriranje korisnika</h1>

{!!Form::open(['action'=>['UserController@update',$user->id],'method'=>'POST'])!!}
<div class="form-group">
   {{Form::label('name','Ime')}}
   {{Form::text('name', $user->name,['class' => 'form-control', 'placeholder' => 'Ime'])}}
</div>
<div class="form-group">
            {{Form::label('lastname','Prezime')}}
            {{Form::text('lastname', $user->lastname,['class' => 'form-control', 'placeholder' => 'Prezime'])}}
</div>
<div class="form-group">
            {{Form::label('username','Korisničko ime')}}
            {{Form::text('username', $user->username,['class' => 'form-control', 'placeholder' => 'Korisničko ime'])}}
</div>
<div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email', $user->email,['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('role','Uloga')}}
            {{Form::text('role', $user->role,['class' => 'form-control', 'placeholder' => 'Uloga'])}}
        </div>
   
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection