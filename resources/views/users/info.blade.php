@extends('adminlte::page')

@section('title', 'Info Peraturan')

@section('content_header')
    <h1 class="m-0 text-dark">Info Pengguna</h1>
@stop

@section('content')
                    <table class='table table-striped table-hover'>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $user->name}}</td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>{{ $user->email}}</td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>{{ $user->level}}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{route('users.index')}}" class="btn btn-default">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop