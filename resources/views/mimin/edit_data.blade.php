@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Edit Data Produk</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('update_data',$produk->id_produk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" placeholder="produk" name="nama_produk" value="{{$produk->nama_produk}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <select class="form-control" name="id_supplier">
                    <option >Pilih Supplier</option>
                    @foreach($supplier as $s)
                    <option value="{{$s->id_supplier}}" {{$produk->id_supplier == $s->id_supplier ? 'selected' :'' }} >{{$s->nama_supplier}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Jumlah Produk</label>
                  <input type="number" class="form-control" placeholder="1" name="stok" value="{{$produk->stok}}">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Berat /pcs</label>
                  <input type="number" class="form-control" placeholder="1" name="berat" value="{{$produk->berat}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="">Harga /pcs</label>
                  <input type="number" class="form-control" placeholder="1000" name="harga_produk" value="{{$produk->harga_produk}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group ">
                  <label>Gambar</label>
                  <div>
                    <input class="form-control" id="formFileSm" type="file" name="gambar_produk" value="{{$produk->gambar_produk}}">
                    <label class="form-control" for="formFileSm">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label >Deskripsi</label>
                  <input type="text" name="deskripsi" placeholder="isi deskripsi disini" class="form-control" value="{{$produk->deskripsi}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class=" ml-auto mr-auto text-center">
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