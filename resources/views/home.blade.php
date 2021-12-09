@extends('adminlte::page')

@section('title', 'JDIH Salatiga')

@section('content_header')
    <h1 class="m-0 text-dark">Halaman Utama</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Selamat Datang di JDIH Salatiga!</p>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                      <thead>
                      <tr>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Jumlah Peraturan</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                    {{-- @foreach ($jenis as $jenis) --}}
                    @foreach($produks as $produk)   
                            <td>{{$produk->jenis_kode}}</td>
                            <td>{{$produk->jenis_nama}}</td>
                            <td>{{$produk->jumlah}}</td>
                        </tr>
                    @endforeach
                    {{-- @endforeach --}}
                    </tbody>
                </table>
<br>

<div class="panel">
  <div id="chartJumlah"></div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>

Highcharts.chart('chartJumlah', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Jumlah Peraturan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
            @foreach($produks as $produk)   
            {
            name: '{{ $produk->jenis_nama }} ({{ $produk->jumlah }})',
            y: {{ $produk->jumlah }},
            sliced: true,
            selected: true
        },
                    @endforeach
            
]
}]
});
</script>
    @stop