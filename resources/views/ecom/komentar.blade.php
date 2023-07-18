@include('template/header')
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="card-body" id="detailtransaksi">
        <div class="container shadow-sm" style="background-color:white;">
            <a href="{{ route('list_transaksi') }}" class="btn"><i class="bi bi-arrow-left-circle-fill"></i></a>
            <h5 style="text-align: center;">Beri komentar</h5>
            <br>
            <div class="container border-top">
                <div class="row">
                    @foreach ($produk_penjualan as $produk)
                        @if (!$produk->sudah_komen)
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('gambar/'.$produk->produk->gambar_produk)}}" alt="" width="200">
                            </div>
                            <div class="col-6">

                                <form action="{{route('save_komentar')}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="id_produk" value="{{$produk->id_produk}}">
                                    <input type="hidden" name="id_penjualan" value="{{$produk->id_penjualan}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Komentar</label>
                                                <div>
                                                    <input class="form-control" id="formFileSm" type="text"
                                                        name="komentar">
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penilaian</label>
                                            <select name="rate" id="">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2  ml-auto mr-auto ">
                                            <label for=""></label><br>
                                            <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>     
                        @endif
                       
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@include('template/footer')
