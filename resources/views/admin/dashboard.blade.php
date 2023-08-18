@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $katagori }}</h3>
                <p>Total Katagori</p>
            </div>
            <div class="icon">
                <i class="fa fa-cube"></i>
            </div>
            {{-- ! ini kana back ke menu katagori --}}
            <a href="{{ route('katagori.index') }}" class="small-box-footer">Lihat Detail<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $produk }}</h3>
                <p>Total Produk</p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
            {{-- ! ini kana back ke menu produk --}}
            <a href="{{ route('produk.index') }}" class="small-box-footer">Lihat Detail<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $pembelian }}</h3>
                <p>Total Pembelian</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            {{-- ! ini kana back ke menu supplier --}}
            <a href="{{ route('pembelian.index') }}" class="small-box-footer">Lihat Detail<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $penjualan }}</h3>
                <p>Total Penjualan</p>
            </div>
            <div class="icon">
                <i class="fa fa-pie-chart"></i>
            </div>
            {{-- ! ini kana back ke menu supplier --}}
            <a href="{{ route('penjualan.index') }}" class="small-box-footer">Lihat Detail<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="text-center">
                    {{-- menampilkan total pendapatan sesuai tanggal awal-akhir --}}
                <h3 class="box-title" class="box-title" style="margin-auto">Grafik Pendapatan {{ tanggal_indo($tanggal_awal) }} s/d {{ tanggal_indo($tanggal_akhir) }}</h3>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: 180px;"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row (main row) -->
<!-- Pop-up Alert -->
<div class="custom-popup text-center">
    <div class="popup-content">
        <h2>Selamat Datang di Halaman Dashboard</h2>
        <h4>Anda Login Sebagai Owner.</h4>
    </div>
</div>
@endsection

@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('AdminLTE/bower_components/chart.js/Chart.js') }}"></script>
<script>
$(function() {
    // Display a welcome alert
    alert("Selamat Datang Di Halaman Dashboard PosKu");
    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);

    var salesChartData = {
        labels: {{ json_encode($data_tanggal) }},
        datasets: [
            {
                label: 'Pendapatan',
                fillColor           : 'rgba(60,141,188,0.9)',
                strokeColor         : 'rgba(60,141,188,0.8)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: {{ json_encode($data_pendapatan) }}
            }
        ]
    };

    var salesChartOptions = {
        pointDot : false,
        responsive : true
    };

    salesChart.Line(salesChartData, salesChartOptions);
});
</script>
@endpush