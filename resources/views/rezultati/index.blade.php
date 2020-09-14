@extends('layouts.app')

@section('content')
<h1>Rezultati</h1>

    <div class="panel panel-default">
    <div class="panel-heading">
           Popis
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($rezultati) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                    
                        <th>Korisnik</th>
                
                        <th>Datum</th>
                        <th>Rezulatat</th>
                        <th>&nbsp;</th>
                    
                    </tr>
                </thead>

                <tbody>
                @if (count($rezultati) > 0)

                        @foreach ($rezultati as $r)
                        <tr>
                        
                                <td>{{ $r->user->name}} ({{ $r->user->email}})</td>
                           
                                <td>{{ $r->created_at }}</td>
                                <td>{{ $r->result }}/10</td>
                                
                               <td>
                                    <a href="{{ route('rezultati.show',[$r->id]) }}" class="btn btn-xs btn-primary">Pregled</a>
                                </td>
                             
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">Prazan popis</td>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
    @endsection
