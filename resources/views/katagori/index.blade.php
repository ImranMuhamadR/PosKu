{{-- Untuk mengakses layouts halaman utama dari layouts.master --}}
@extends('layouts.master')

@section('title')
    Daftar Katagori
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Katagori</li>
@endsection

@section('content')
                        <div class="row">
                            <div class="col-md-12">
                              <div class="box">
                                <div class="box-header with-border">
                                  <button onclick="addForm('{{ route('katagori.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>Tambah</button>
                                </div>
                                {{-- ini ketika di akases menggunakan perangkat device akan responsive karena menggunakan table-responsive --}}
                                <div class="box-body table-responsive">
                                    <table class="table table-stiped table-bordered">
                                        <thead>
                                            <th width="5%">No</th>
                                            <th>Katagori</th>
                                            <th width="15%"><i class="fa fa-cog"></i></th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                              </div>
                            </div>
                          </div>

@includeIf('katagori.form')
@endsection

@push('scripts')
    <script>
        let table;
        $(function (){
            table = $('.table').DataTable({
                processing: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('katagori.data') }}',
                },
                columns: [
                    // ini akan menampilakn kolom pada tabel katagori
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'nama_katagori'},
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
        // fungsi ini untuk add data baru pada form di tabel katagori
        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Katagori');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=nama_katagori]').focus();
        }
        // fungsi ini untuk mengedit data pada tabel katagori
        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Katagori');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=nama_katagori]').focus();

            $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_katagori]').val(response.nama_katagori);
            })
            .fail((error) => {
                alert('Tidak Dapat Menampilkan Data')
            });
        }
        // fungsi ini untuk menghapus 1 data di tabel katagori
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