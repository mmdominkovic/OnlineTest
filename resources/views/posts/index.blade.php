@extends('layouts.app')

@section('content')
    <h1>Objave</h1>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on: {{$post->created_at}} by Prof.{{$post->user->name}} {{$post->user->lastname}}</small>
            </div>
            
        @endforeach
        {{$posts->links()}}
    @else
        <h2>Nema objava!</h2>
    @endif
    
    <a href="/posts/create" class="btn btn-primary float-right">Napravi objavu</a>
@endsection