@extends('adminlte::page')

@section('title', 'Info Jenis')

@section('content_header')
    <h1 class="m-0 text-dark">Info Jenis</h1>
@stop

@section('content')
                    <table class='table table-striped table-hover'>
                        <tr>
                            <td>Kode</td>
                            <td>{{ $jenis->kode}}</td>
                        </tr>
                        <tr>
                            <td>Kode Berkas</td>
                            <td>{{ $jenis->kode_berkas}}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $jenis->nama}}</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>{{ $jenis->keterangan}}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{route('jenis.index')}}" class="btn btn-default">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop