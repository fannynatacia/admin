@extends('adminlte::page')

@section('title', 'Tambah Peraturan')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Peraturan</h1>
@stop

@section('content')
<?php 
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
?>
    <form action="{{route('produk.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- {{ $jenis }} --}}
                    <div class="form-group">
                        <label for="jenis_kode">Jenis Kode</label>
                        <select name="jenis_kode" class="form-control @error('jenis_kode') is-invalid @enderror">
                            @error('jenis_kode') <span class="text-danger">{{$message}}</span> @enderror>
                            
                            @foreach($jenis as $j){
                                 <option value={{ $j->kode }}>{{ $j->nama }}</option>';
                            @endforeach
                        
                        </select>

                        {{-- <input type="text"  --}}
                    </div>

                    <div class="form-group">
                        <label for="Nomor">Nomor</label>
                        <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" placeholder="Nomor Peraturan" name="nomor" value="{{old('nomor')}}">
                        @error('nomor') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Tahun">Tahun</label>
                        <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" placeholder="Tahun" name="tahun">
                        @error('tahun') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Tentang</label>
                        <input type="tentang" class="form-control" id="tentang" placeholder="Tentang" name="tentang">
                        @error('tentang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        
                        <label for="tanggalPenetapan">Tanggal Penetapan</label>
                        <input type="date" class="form-control datepicker" id="tanggal_penetapan" placeholder="Tanggal Penetapan" name="tanggal_penetapan" onchange="" required value="{!!$today!!}">
                    </div>
                    <div class="form-group">
                       
                        <label for="tanggalPengundangan">Tanggal Pengundangan</label>
                        <input type="date" class="form-control" id="tanggal_pengundangan" placeholder="Tanggal Pengundangan" name="tanggal_pengundangan" onchange="" required value="{!!$today!!}">
                    </div>
                    <div class="form-group">
                        <b>File Peraturan</b><br/>
                        <input type="file" name="berkas">
                        <p>File dalam Format pdf</p>
                    </div>
 
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop