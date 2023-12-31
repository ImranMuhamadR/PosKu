{{-- Untuk mengakses layouts halaman utama dari layouts.master --}}
@extends('layouts.master')

@section('title')
    Daftar Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Produk</li>
@endsection

@section('content')
                        <div class="row">
                            <div class="col-md-12">
                              <div class="box">
                                <div class="box-header with-border">
                                  <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>Tambah</button>
                                  <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i>Hapus</button>
                                </div>
                                <div class="box-body table-responsive">
                                    <form action="" class="form-produk">
                                        @csrf
                                        <table class="table table-stiped table-bordered">
                                            <thead>
                                                <th>
                                                    <input type="checkbox" name="select_all" id="select_all">
                                                </th>
                                                <th width="5%">No</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Katagori</th>
                                                <th>Tipe</th>
                                                <th>Merk</th>
                                                <th>Tanggal</th>
                                                <th>Supplier</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                                <th width="15%"><i class="fa fa-cog"></i></th>
                                            </thead>
                                        </table>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>

@includeIf('produk.form')
@endsection

@push('scripts')
    <script>
        let table;
        $(function (){
            table = $('.table').DataTable({
                processing: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('produk.data') }}',
                },
                columns: [
                    {data: 'select_all', searchable: false, sortable: false},
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'kode_produk'},
                    {data: 'nama_produk'},
                    {data: 'nama_katagori'},
                    {data: 'tipe'},
                    {data: 'merk'},
                    {data: 'tanggal'},
                    {data: 'supplier'},
                    {data: 'harga_beli'},
                    {data: 'harga_jual'},
                    {data: 'stok'},
                    {data: 'aksi', searchable: false, sortable: false},
                ]
            });
            $('#modal-form').validator().on('submit', function (e) {
                if (! e.preventDefault()) {
                    $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak Dapat Menyimpan Data');
                        return;
                    });
                }
            });

            // ketika  di klik maka secara otomatis akan terselect semuanya
            $('[name=select_all]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
            });
        });
        // fungsi ini untuk add data baru pada form di tabel produk
        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Produk');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=nama_produk').focus();
        }
        // fungsi ini untuk edit data pada form di tabel produk
        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Produk');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=nama_produk').focus();

            $.get(url)
            .done((response) => {
                // ini akan menampilakan respon secara otomatis jika datanya ingin di manumpulasi
                $('#modal-form [name=nama_produk]').val(response.nama_produk);
                $('#modal-form [name=id_katagori]').val(response.id_katagori);
                $('#modal-form [name=tipe]').val(response.tipe);
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=tanggal]').val(response.tanggal);
                $('#modal-form [name=supplier]').val(response.supplier);
                $('#modal-form [name=harga_beli').val(response.harga_beli);
                $('#modal-form [name=harga_jual]').val(response.harga_jual);
                $('#modal-form [name=stok]').val(response.stok);
            })
            .fail((error) => {
                alert('Tidak Dapat Menampilkan Data')
            });
        }
        // fungsi ini untuk mendelete 1 data yang di pilih saja
        function deleteData(url) {
            if (confirm('Yakin Ingin Menghapus Data Ini ?')) {
                $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'delete'
            })
            .done((response) => {
                table.ajax.reload();
            })
            .fail((error) => {
                alert('Tidak Dapat Menghapus Data')
                return;
            });
            }
        }
        // fungsi ini untuk mendelete data yang dipilih pada kolom produk
        function deleteSelected(url) {
        if ($('input:checked').length > 1) {
            if (confirm('Yakin Ingin Menghapus Data Yang Dipilih ?')) {
                $.post(url, $('.form-produk').serialize())
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak Dapat Menghapus Data');
                        return;
                    });
            }
        } else {
            alert('Pilih Data Yang Igin Dihapus');
            return;
        }
    }
    </script>
@endpush