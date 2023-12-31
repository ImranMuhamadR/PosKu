  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog" role="document">
      <form action="" method="post" class="form-horizontal">
        @csrf
        @method('post')

        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              {{-- ini untuk kolom nama yang ada pada table produk --}}
              <div class="form-group row">
                <label for="nama_produk" class="col-md-2 col-md-offset-1 control-label">Nama</label>
                <div class="col-md-9">
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" required autofocus>
                    <span class="help-block with-errors"></span>
                </div>
              </div>
              {{-- ini untuk kolom katagori pada table produk --}}
              <div class="form-group row">
                <label for="id_katagori" class="col-md-2 col-md-offset-1 control-label">Katagori</label>
                <div class="col-md-9">
                    <select name="id_katagori" id="id_katagori" class="form-control" required>
                      <option value="">~ Pilih Katagori ~</option>
                      @foreach ($katagori as $key => $item)
                          <option value="{{ $key }}">{{ $item }}</option>
                      @endforeach
                    </select>
                    <span class="help-block with-errors"></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tipe" class="col-md-2 col-md-offset-1 control-label">Tipe</label>
                <div class="col-md-9">
                  <input type="text" name="tipe" id="tipe" class="form-control">
                  <span class="help-block with-errors"></span>
                </div>
            </div>
              {{-- ini untuk kolom merk yang ada pada table produk --}}
              <div class="form-group row">
                <label for="merk" class="col-md-2 col-md-offset-1 control-label">Merk</label>
                <div class="col-md-9">
                  <input type="text" name="merk" id="merk" class="form-control">
                  <span class="help-block with-errors"></span>
                </div>
            </div>
              <div class="form-group row">
                <label for="tanggal" class="col-md-2 col-md-offset-1 control-label">Tanggal</label>
                <div class="col-md-9">
                  <input type="date" name="tanggal" id="tanggal" class="form-control">
                  <span class="help-block with-errors"></span>
                </div>
            </div>
              <div class="form-group row">
                <label for="supplier" class="col-md-2 col-md-offset-1 control-label">Supplier</label>
                <div class="col-md-9">
                  <input type="text" name="supplier" id="supplier" class="form-control">
                  <span class="help-block with-errors"></span>
                </div>
            </div>
            {{-- ini untuk kolom harga beli pada table produk --}}
            <div class="form-group row">
              <label for="harga_beli" class="col-md-2 col-md-offset-1 control-label">Harga Beli</label>
              <div class="col-md-9">
                <input type="number" name="harga_beli" id="harga_beli" class="form-control">
                <span class="help-block with-errors"></span>
              </div>
          </div>
          {{-- ini untuk kolom harga jual pada table produk --}}
          <div class="form-group row">
            <label for="harga_jual" class="col-md-2 col-md-offset-1 control-label">Harga Jual</label>
            <div class="col-md-9">
              <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
              <span class="help-block with-errors"></span>
            </div>
        </div>
        {{-- ini untuk kolom stok pada table produk --}}
          <div class="form-group row">
            <label for="stok" class="col-md-2 col-md-offset-1 control-label">Stok</label>
            <div class="col-md-9">
              <input type="number" name="stok" id="stok" class="form-control" required value="0">
              <span class="help-block with-errors"></span>
            </div>
        </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-flat btn-primary">Simpan</button>
                <button type="button" class="btn btn-sm btn-flat btn-default" data-dismiss="modal">Batal</button>
            </div>
          </div>
      </form>
    </div>
  </div>