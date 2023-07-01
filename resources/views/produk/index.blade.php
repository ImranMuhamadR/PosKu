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
                                  <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-success xs btn-flat"><i class="fa fa-plus-circle"></i>Tambah</button>
                                </div>
                                <div class="box-body table-responsive">
                                    <table class="table table-stiped table-bordered">
                                        <thead>
                                            <th width="5%">No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Katagori</th>
                                            <th>Merk</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Diskon</th>
                                            <th>Stok</th>
                                            <th width="15%"><i class="fa fa-cog"></i></th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
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
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'kode_produk'},
                    {data: 'nama_produk'},
                    {data: 'nama_katagori'},
                    {data: 'merk'},
                    {data: 'harga_beli'},
                    {data: 'harga_jual'},
                    {data: 'diskon'},
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
        });

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Produk');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=nama_produk').focus();
        }
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
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=harga_beli').val(response.harga_beli);
                $('#modal-form [name=harga_jual]').val(response.harga_jual);
                $('#modal-form [name=diskon]').val(response.diskon);
                $('#modal-form [name=stok]').val(response.stok);
            })
            .fail((error) => {
                alert('Tidak Dapat Menampilkan Data')
            });
        }
        function deleteData(url) {
            if (confirm('Yakin Ingin Menghapus Data Ini?')) {
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
    </script>
@endpush