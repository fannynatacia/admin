@extends('adminlte::page')
@section('title', 'Produk Hukum')
@section('content_header')
    <h1 class="m-0 text-dark">Jenis Produk Hukum</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->level=="Admin")
                    <a href="{{route('jenis.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    @endif
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jenis as $key => $jenis)
                            <tr>
                                <td><a href="/produk/jenis/{{ $jenis->kode }}">{{$jenis->nama}} {{ $jenis->produk->count() ? '('. $jenis->produk->count().')' : '' }}</a></td>
                                <td>
                                    <a href="{{route('jenis.show', $jenis)}}" class="btn btn-primary btn-xs">
                                        Info
                                    </a>
                                    <a href="{{route('jenis.edit', $jenis)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('jenis.destroy', $jenis)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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