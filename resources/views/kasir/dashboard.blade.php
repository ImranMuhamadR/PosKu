@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@push('css')
<style>
    .content-bg {
        background-image: url('img/forestBg.jpg'); /* Ganti 'path/to/your/image.jpg' dengan path file gambar yang ingin digunakan sebagai background */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        min-height: 500px; /* Sesuaikan tinggi sesuai kebutuhan */
    }
    .text-color{
        text-shadow: 3px;
        color: white;
    }
</style>
@endpush

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body text-center content-bg">
                <div class="text-color">
                    <h1>Selamat Datang Di PosKu</h1>
                    <h2>Anda Masuk Sebagai KASIR</h2>
                </div><br><br>
                <a href="{{ route('transaksi.baru') }}" class="btn btn-success btn-lg">Transaksi Baru</a>
                <br><br><br>
            </div>
        </div>
    </div>
</div>
<!-- /.row (main row) -->
<script>
    alert("Selamat Datang Di Halaman Dashboard");
</script>
@endsection