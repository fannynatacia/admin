@extends('adminlte::page')
@section('title', 'Edit Produk')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Produk</h1>
@stop
@section('content')
    <form action="{{route('jenis.update', $jenis)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="" name="kode" value="{{$jenis->kode ?? old('kode')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Kode Berkas</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="" placeholder="" name="kode_berkas" value="{{$jenis->kode_berkas ?? old('kode_berkas')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Nama</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="" placeholder="" name="nama" value="{{$jenis->nama ?? old('nama')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Keterangan</label>
                        <input type="text" class="form-control" id="exampleInputPassword" placeholder="" name="keterangan" value="{{$jenis->keterangan ?? old('keterangan')}}">
                    </div>
                </div>
                <div class="card-footer">
                    @if ($jenis->produk->count() != 0)
                    <p>Terdapat sebanyak {{ $jenis->produk->count()}} {{ $jenis->nama }}, jika anda mengubah jenis peraturan ini maka {{ $jenis->produk->count()}} {{ $jenis->nama }} akan terubah </p>
                    @endif
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('jenis.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop