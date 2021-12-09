@extends('adminlte::page')

@section('title', 'Info Peraturan')

@section('content_header')
    <h1 class="m-0 text-dark">Info Peraturan</h1>
@stop

@section('content')
                    <table class='table table-striped table-hover'>
                        <tr>
                            <td>Jenis</td>
                            <td>{{ $produk->jenis->nama}}</td>
                        </tr>
                        <tr>
                            <td>Nomor</td>
                            <td>{{ $produk->nomor}}</td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>{{ $produk->tahun}}</td>
                        </tr>
                        <tr>
                            <td>Tentang</td>
                            <td>{{ $produk->tentang}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Penetapan</td>
                            <td>{{ $produk->tanggal_penetapan}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengundangan</td>
                            <td>{{ $produk->tanggal_pengundangan}}</td>
                        </tr>
                        <tr><td>File Peraturan</td>
                            <td>
                                <a href = "{{ route('produk.download', $produk->berkas) }}">{{ $produk->berkas }}</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{route('produk.index')}}" class="btn btn-default">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop