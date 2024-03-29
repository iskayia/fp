@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Data Pembelian</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_pembelian',$pembelian->id_pembelian) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Produk</label>
                                    <select class="form-control" name="id_produk">
                                        <option selected>Pilih produk</option>
                                        @foreach($produk as $p)
                                        <option value="{{$p->id_produk}}" {{$pembelian->id_produk == $p->id_produk ? 'selected':''}} >{{$p->nama_produk}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Jumlah Produk</label>
                                    <input type="number" class="form-control" name="jumlah_pembelian" value="{{$pembelian->jumlah_pembelian}}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Beli/pcs</label>
                                    <input type="number" class="form-control" name="harga_pembelian" value="{{$pembelian->harga_pembelian}}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Tanggal Entri</label>
                                    <input class="form-control date-picker" name="tgl_pembelian" value="{{ date('Y-m-d',strtotime($pembelian->tgl_pembelian))}}" type="date" >
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