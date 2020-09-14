@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <hr>
    <div style="max-width:80%">
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        {{Form::label('pred','Predmet')}}
        <select name="predmet_id" class="form-control">      
            @foreach($predmet as $p)         
                <option value="{{$p->id}}">{{$p->title}} </option>
            @endforeach
        </select>
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body', '',['id' =>'editor1','class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>   
        <br>
        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
    </div>
@endsection

