@extends('adminlte::page')
@section('title', 'Tambah Produk Hukum')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Jenis Produk Hukum</h1>
@stop
@section('content')
    <form action="{{route('jenis.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="" name="kode">
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Kode Berkas</label>
                        <input type="text" class="form-control @error('kode_berkas') is-invalid @enderror" id="kode_berkas" placeholder="" name="kode_berkas">
                        @error('kode_berkas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="" name="nama">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" placeholder="" name="keterangan">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('jenis.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop