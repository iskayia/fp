@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Tambah Data Produk</h5>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" placeholder="Vanilla" value="Vanilla">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input type="text" class="form-control" placeholder="Nuna" value="Nuna">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Jenis Produk</label>
                  <input type="number" class="form-control" placeholder="Aroma" value="Aroma">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Jumlah Produk</label>
                  <input type="number" class="form-control" placeholder="1">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga</label>
                  <input type="email" class="form-control" placeholder="1000">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group ">
                  <label>Gambar</label>
                  <div class="custom-file">
                    <input class="custom-file-input" id="formFileSm" type="file" name="gambar">
                    <label class="custom-file-label" for="formFileSm">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto text-center">
                <button type="submit" class="btn btn-primary btn-round">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@include('mimin/footer_mimin')