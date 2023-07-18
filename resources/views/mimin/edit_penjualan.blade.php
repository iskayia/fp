@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Perbaharui Status</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_penjualan', $penjualan->id_penjualan) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status Pembayaran</label>
                                    <select class="form-control" id="status_pembayaran" name="status_pembayaran">
                                        <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                        <option value="Lunas">Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status Transaksi</label>
                                    <select class="form-control" id="status_transaksi" name="status_transaksi">
                                        <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                        <option value="Pesanan Diproses">Pesanan Diproses</option>
                                        <option value="Pesanan Dikirim">Pesanan Dikirim</option>
                                        <option value="Pesanan Dibatalkan">Pesanan Dibatalkan</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Bukti Bayar</label>
                                <img src="{{asset('gambar/' . $penjualan->pembayaran->bukti_bayar)}}" alt="">
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
