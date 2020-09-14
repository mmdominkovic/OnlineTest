@extends('layouts.app')

@section('content')
<h1>Rezultati </h1>

    <div class="panel panel-default">
        <div class="panel-heading">
           Pregled
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        @if(auth()->user()->role == 'Profesor')
                        <tr>
                            <th>Korisnik</th>
                            <td>{{ $test->user->name }} ({{ $test->user->email }})</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Datum</th>
                            <td>{{ $test->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Rezultat</th>
                            <td>{{ $test->result }}/10</td>
                        </tr>
                    </table>

                    
                    <?php $i = 1 ?>
                @foreach($rezultati as $r)
                    <table class="table table-bordered table-striped">
                        <tr class="test-option{{ $r->correct ? '-true' : '-false' }}">
                            <th style="width: 10%">Pitanje {{ $i }}</th>
                            <th>{{ $r->pitanje->question_text}}</th>
                        </tr>
                        <tr>
                            <td>Odgovori</td>
                            <td>
                                <ul>
                                @foreach($r->pitanje->odgovori as $o)
                                    <li style="@if ($o->correct == 1) font-weight: bold; @endif
                                        @if ($r->option_id == $o->id) text-decoration: underline @endif">{{ $o->option }}
                                        @if ($o->correct == 1) <em>(Točan odgovor)</em> @endif
                                        @if ($r->option_id == $o->id) <em>(tvoj odgovor)</em> @endif
                                    </li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                       
                    </table>
                <?php $i++ ?>
                @endforeach
                </div>
            </div>

      

            <a href="{{ route('testovi.index') }}" class="btn btn-default">Take another quiz</a>
            <a href="{{ route('rezultati.index') }}" class="btn btn-default">See all my results</a>
        </div>
    </div>
    @endsection

