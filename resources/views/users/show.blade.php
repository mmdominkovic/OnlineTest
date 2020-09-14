@extends('layouts.app')

@section('content')
<h3 class="page-title">Korisnik</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
Pregled        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr> <th>Ime</th>
                                <td>{{ $user->name }}</td>
                        </tr>
                        <tr> <th>Email</th>
                                <td>{{ $user->email }}</td>
                        </tr>
                        <tr> <th>@lang('quickadmin.users.fields.password')</th>
                    <td>---</td>
                    </tr><tr><th>@lang('quickadmin.users.fields.role')</th>
                    <td>{{ $user->role }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('users.index') }}" class="btn btn-default">Nazad</a>
        </div>
    </div>
@stop