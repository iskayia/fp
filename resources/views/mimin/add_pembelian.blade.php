@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Tambah Data Pembelian</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('add_pembelian_action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Produk</label>
                                    <select class="form-control" name="id_produk">
                                        <option selected>Pilih produk</option>
                                        @foreach($produk as $p)
                                        <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Jumlah Produk</label>
                                    <input type="number" class="form-control" placeholder="1" name="jumlah_pembelian">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Beli/pcs</label>
                                    <input type="number" class="form-control" placeholder="1000" name="harga_pembelian">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Tanggal Entri</label>
                                    <input class="form-control date-picker" name="tgl_pembelian" placeholder="Masukkan tanggal entri" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-success add-more-bm" type="button">
                                <i class="glyphicon glyphicon-plus"></i> Tambah
                            </button>
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