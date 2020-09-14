@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Objavljeno: {{$post->created_at}} Objavio: {{$post->user->name}} {{$post->user->lastname}}</small><br><br>
    <hr>
    <ul class="list-group">
        <li class="list-group-item">   
        <h1 class="text-center"><em>Komentari</em> </h1>
        </li>
        @foreach ($post->comment as $comment)
            <div>
                <li class="list-group-item">
                        <strong><i>Komentirao:</i></strong> <i>{!!$comment->user->name!!} {!!$comment->user->lastname!!}</i>
                </li>
                <li class="list-group-item">
                        <strong>Komentar:</i></strong><p><i> {!!$comment->content!!} </i></p> 
                </li>
                
                <li class="list-group-item">     
                    @if (Auth::user()->id == $post->user_id || (auth()->user()->role == 'Admin') || (auth()->user()->role == 'Profesor' ))   
                        {!! Form::open(['action' => ['CommentsController@destroy', $comment->id],'method'=>'POST']) !!}    
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Obriši',['class' => 'btn btn-danger move-right'])}}
                        {!! Form::close() !!}
                    @endif
                </li>
            
                
            </div> 
        @endforeach
    </ul>
        <hr>
    @if(!Auth::guest())
            <a class="btn btn-info text-white" href="comment/{!!$post->id!!}">Komentiraj</a>
            @if (Auth::user()->id == $post->user_id || (auth()->user()->role == 'Admin') || (auth()->user()->role == 'Profesor' ))
                <a href="/posts/{{$post->id}}/edit" class="btn btn-default pull-right">Uredi</a>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' =>'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Obriši', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
    @endif
@endsection