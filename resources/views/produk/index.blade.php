@extends('adminlte::page')

@section('title', 'List Peraturan')

@section('content_header')
    <h1 class="m-0 text-dark">{{ $nama_jenis }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('produk.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Kode</th>
                            <th>Nomor Peraturan</th>
                            <th>Tahun</th>
                            <th>Tentang</th>
                            <th>Tanggal Penetapan</th>
                            <th>Tanggal Pengundangan</th>
                            <th>Berkas</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                        @foreach($produk as $key => $produk)   
                                <td>{{$key+1}}</td>
                                <td>{{$produk->jenis_kode}}</td>
                                <td>{{$produk->nomor}}</td>
                                <td>{{$produk->tahun}}</td>
                                <td>{{$produk->tentang}}</td>
                                <td>{{$produk->tanggal_penetapan}}</td>
                                <td>{{$produk->tanggal_pengundangan}}</td>
                                <td>{{$produk->berkas}}</td>
                                <td>
                                    <a href="{{route('produk.show', $produk)}}" class="btn btn-primary btn-xs">
                                        Info
                                    </a>
                                    <a href="{{route('produk.edit', $produk)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('produk.destroy', $produk)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush