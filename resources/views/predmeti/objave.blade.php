@extends('layouts.app')
@section('content')
<h2 class="row justify-content-center">Obavijesti za kolegij {{$pred->title}}</h2><br><hr>
<div class="row justify-content-center">
    <table class="table table-striped table-bordered" style="max-width:70%">
        @if(count($pred->post) > 0)
            @foreach ($pred->post as $post)
                <thead>
                    <tr>   
                        <th scope="col">Naziv</th>
                        <th scope="col">Započeo</th>
                        <th scope="col">Stvoreno</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>    
                        <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                </tbody>
            @endforeach
        @else
            <h1> Nema Obavijesti</h1>
        @endif
    </table>
</div>
<hr>

<a href="/predmeti/{{$pred->id}}" class="btn btn-danger pull-right">Nazad</a>    
@if (Auth::user()->id == $pred->user_id || (auth()->user()->role == 'Admin')|| (auth()->user()->role == 'Profesor' ))  
    <a href="/predmeti/{{$pred->id}}/napravi" class="btn btn-primary ">Napravi post</a>
@endif

@endsection

