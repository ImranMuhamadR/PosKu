@extends('layouts.master')

@section('title')
    Transaksi Penjualan
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Transaksi Penjualan</li>
@endsection

@push('css')
<style>
/* CSS */
.container-center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 15vh; /* Menyesuaikan tinggi container sesuai dengan tinggi viewport */
}

.alert {
  text-align: center; /* Mengatur teks menjadi tengah */
  max-width: 400px; /* Atur lebar maksimum agar pesan tidak terlalu lebar */
}

.box-footer {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 15vh; /* Menyesuaikan tinggi konten dengan tinggi viewport */
}

</style>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                {{-- fix --}}
                {{-- <div class="alert alert-success alert-dismissible">
                    <i class="fa fa-check icon"></i>
                    Yeyys Transaksi Berhasil Disimpan.
                </div> --}}
                <div class="container-center">
                    <div class="alert alert-success alert-dismissible">
                        <i class="fa fa-check icon"></i>
                        Yeyys Transaksi Berhasil Disimpan.
                    </div>
                </div>
                
            </div>
            {{-- fix --}}
            {{-- <div class="box-footer">
                @if ($setting->tipe_nota == 1)
                <button class="btn btn-warning btn-flat" onclick="notaKecil('{{ route('transaksi.nota_kecil') }}', 'Nota Kecil')">Cetak Nota</button>
                @else
                <button class="btn btn-warning btn-flat" onclick="notaBesar('{{ route('transaksi.nota_besar') }}', 'Nota PDF')">Cetak Nota</button>
                @endif
                <a href="{{ route('transaksi.baru') }}" class="btn btn-primary btn-flat">Transaksi Baru</a>
            </div> --}}
            <div class="box-footer">
                    <div class="text-center">
                        @if ($setting->tipe_nota == 1)
                        <button class="btn btn-warning btn-flat" onclick="notaKecil('{{ route('transaksi.nota_kecil') }}', 'Nota Kecil')">Cetak Nota</button>
                        @else
                        <button class="btn btn-warning btn-flat" onclick="notaBesar('{{ route('transaksi.nota_besar') }}', 'Nota PDF')">Cetak Nota</button>
                        @endif
                        <a href="{{ route('transaksi.baru') }}" class="btn btn-primary btn-flat">Transaksi Baru</a>        
                    </div>
            </div>
        </div>
    </div> 
</div>
@endsection

@push('scripts')
<script>
    // tambahkan untuk delete cookie innerHeight terlebih dahulu
    document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    
    function notaKecil(url, title) {
        popupCenter(url, title, 625, 500);
    }

    function notaBesar(url, title) {
        popupCenter(url, title, 900, 675);
    }

    // menampilkan pop up center
    function popupCenter(url, title, w, h) {
        const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
        const dualScreenTop  = window.screenTop  !==  undefined ? window.screenTop  : window.screenY;

        const width  = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom = width / window.screen.availWidth;
        const left       = (width - w) / 2 / systemZoom + dualScreenLeft
        const top        = (height - h) / 2 / systemZoom + dualScreenTop
        const newWindow  = window.open(url, title, 
        `
            scrollbars=yes,
            width  = ${w / systemZoom}, 
            height = ${h / systemZoom}, 
            top    = ${top}, 
            left   = ${left}
        `
        );

        if (window.focus) newWindow.focus();
    }
</script>
@endpush