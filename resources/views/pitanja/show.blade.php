@extends('layouts.app')

@section('content')
    <h3 class="page-title">Pitanja</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
Pregled        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                        <th>Predmet</th>
                    <td>{{ $pitanje->predmet->title }}</td></tr>
                    <tr><th>Tekst pitanja</th>
                    <td>{!! $pitanje->question_text !!}</td></tr><tr>
                  
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('pitanja.index') }}" class="btn btn-default">Nazad</a>
        </div>
    </div>
@stop