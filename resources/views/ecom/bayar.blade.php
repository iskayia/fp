@include('template/header')
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="card-body" id="detailtransaksi">
        <div class="container shadow-sm" style="background-color:white;">
            <form action="{{ route('bayar_action') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <a href="{{ route('list_transaksi') }}" class="btn"><i class="bi bi-arrow-left-circle-fill"></i></a>
                <h5 style="text-align: center;">Upload Bukti Bayar</h5>
                <br>
                <div class="container border-top">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Unggah Bukti Bayar</label>
                                    <div><input class="form-control" type="hidden"
                                            value="{{ $penjualan->id_penjualan }}" name="id_penjualan">
                                        <input class="form-control" id="formFileSm" type="file" name="bukti_bayar">
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>                                                      
                            <div class="col-md-2  ml-auto mr-auto ">
                                <label for=""></label><br>
                                <button type="submit" class="btn btn-primary btn-round">Unggah</button>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('gambar/' . $penjualan->pembayaran->bukti_bayar)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@include('template/footer')
