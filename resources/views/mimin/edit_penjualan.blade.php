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
                    <form action="{{ route('update_penjualan',$penjualan->id_penjualan) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Produk</label>
                                    <select class="form-control" name="id_produk">
                                        <option selected>Pilih produk</option>
                                        @foreach($produk as $p)
                                        <option value="{{$p->id_produk}}" {{$penjualan->id_produk == $p->id_produk ? 'selected':''}}>{{$p->nama_produk}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Jumlah Produk</label>
                                    <input type="number" class="form-control" placeholder="1" name="jumlah_penjualan" value="{{$penjualan->jumlah_penjualan}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Entri</label>
                                    <input class="form-control date-picker" name="tgl_penjualan" value="{{ date('Y-m-d',strtotime($penjualan->tgl_penjualan))}}" type="date">
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