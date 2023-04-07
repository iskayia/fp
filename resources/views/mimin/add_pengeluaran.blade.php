@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Tambah Data Penjualan</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Produk</label>
                                    <input type="text" class="form-control" placeholder="Vanilla" value="Vanilla">
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
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Entri</label>
                                    <input class="form-control date-picker" name="tgl_pembelian[]" placeholder="Masukkan tanggal entri" type="text">
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