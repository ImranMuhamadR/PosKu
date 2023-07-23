<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img
                    src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}"
                    class="img-circle"
                    alt="User Image"></div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#">
                        <i class="fa fa-circle text-success"></i>
                        Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="header">MASTER</li>
                <li>
                    {{-- ini akan mengarah ke content katagori --}}
                    <a href="{{ route('katagori.index') }}">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                        <span>Katagori</span>
                    </a>
                </li>
                <li>
                    {{-- ini akan mengarah ke content produk --}}
                    <a href="{{ route('produk.index') }}">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    {{-- ini akan mengarah ke kontent member --}}
                    <a href="{{ route('member.index') }}">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i>
                        <span>Member</span>
                    </a>
                </li>
                <li>
                    {{-- ini akan mengarahkan ke content supplier --}}
                    <a href="{{ route('supplier.index') }}">
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        <span>Supplier</span>
                    </a>
                </li>
                <li class="header">Transaksi</li>
                <li>
                    {{-- ini akan mengarah ke content pengeluaran --}}
                    <a href="{{ route('pengeluaran.index') }}">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                        <span>Pengeluaran</span>
                    </a>
                </li>
                <li>
                    {{-- ini akan mengarah ke content pembelian --}}
                    <a href="{{ route('pembelian.index') }}">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <span>Pembelian</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-pie-chart" aria-hidden="true"></i>
                        <span>Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi.index') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Transaksi Lama</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi.baru') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Transaksi Baru</span>
                    </a>
                </li>
                <li class="header">Report</li>
                <li>
                    <a href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li class="header">Settings</li>
                <li>
                    <a href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>