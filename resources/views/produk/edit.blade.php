@extends('adminlte::page')

@section('title', 'Edit Peraturan')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Peraturan</h1>
@stop

@section('content')
    <form action="{{route('produk.update', $produk)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="jenis_kode">Jenis Kode</label>
                        <select name="jenis_kode" class="form-control @error('jenis_kode') is-invalid @enderror">
                            @error('jenis_kode') <span class="text-danger">{{$message}}</span> @enderror>
                            @foreach($jenis as $j){
                                 <option value="{{ $j->kode }}" {{ $j->kode==$produk->jenis_kode ? "selected" : ""}}>{{ $j->nama }}</option>';
                            @endforeach
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nomor">Nomor</label>
                        <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" placeholder="Masukkan Nomor Peraturan" name="nomor" value="{{($produk->nomor) ?? old('nomor')}}">
                        @error('nomor') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Tahun">Tahun</label>
                        <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" placeholder="Tahun" name="tahun" value="{{$produk->tahun ?? old('tahun')}}">
                        @error('tahun') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Tentang">Tentang</label>
                        <input type="text" class="form-control" id="tentang" placeholder="Tentang" name="tentang" value="{{$produk->tentang ?? old('tentang')}}">
                    </div>
                    <div class="form-group">
                        <label for="tanggalPenetapan">Tanggal Penetapan</label>
                        <input type="date" class="form-control @error('tanggal_penetapan') is-invalid @enderror" id="tanggal_penetapan" placeholder="dd-mm-yyyy" timezone="[[timezone]]" name="tanggal_penetapan" value="{{$produk->tanggal_penetapan ?? old('tanggal_penetapan')}}">
                        @error('tanggal_penetapan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggalPengudangan">Tanggal Pengundangan</label>
                        <input type="date" class="form-control @error('tanggal_pengundangan') is-invalid @enderror" id="tanggal_pengundangan" placeholder="dd-mm-yyyy" timezone="[[timezone]]" name="tanggal_pengundangan" value="{{$produk->tanggal_pengundangan ?? old('tanggal_pengundangan')}}">
                        @error('tanggal_pengundangan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                        @endif
                    <div class="form-group">
                        <b>File Peraturan</b><br/>
                        <input type="file" name="berkas">
                        <p>File dalam Format pdf</p>
                        <td>
                            <a href = "{{ route('produk.download', $produk->berkas) }}">{{ $produk->berkas }}</a>
                        </td>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('produk.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop