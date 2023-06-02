@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h3 class="description">Laporan</h3>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pilih Jenis Laporan</h4>
                </div>
                <div class="card-body">
                    <h5>Laporan Transaksi :</h5>
                    <form action="{{route('buka_laporan')}}" method="post" >
                    @csrf
                    @method("POST")
                            <div class="col-md-6 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="laporan" id="flexRadioDefault1" value="pembelian">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Pembelian
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="laporan" id="flexRadioDefault2" value="penjualan">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Penjualan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="laporan" id="flexRadioDefault2" value="keuangan">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Keuangan
                                    </label>
                                </div>
                            </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tanggal Entri</label>
                                <input class="form-control date-picker" name="daterange" placeholder="Masukkan rentang waktu entri" type="text">
                            </div>
                        </div>
                        <div class="update ml-auto mr-auto text-center">
                                    <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('mimin/footer_laporan')