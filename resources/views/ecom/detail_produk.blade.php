@include('template/header')
<section class="page-section center " id="services" style="background-color:#FEFCF3; height:100%; ">
    <h3 style="text-align: center;">Detail Produk</h3>
    <div class="card-body border-down" style="display: flex; justify-content: center; align-items: center;">
        <br>

        <div class="card mb-3 shadow-sm" style="max-width: 75%; ">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('gambar/' . $produk->gambar_produk) }}" class="img-fluid rounded-start"
                        alt="Produk Fitri Parfume">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">{{ $produk->nama_produk }}</h4>
                        <p>Terjual : 165 pcs</p>
                        <br>
                        <h6 class="card-text" style="color: orange;"> Rp.{{ number_format($produk->harga_produk) }}</h6>
                        <p class="card-text">{{ $produk->deskripsi }}</p>
                        <div class=""  style="height: 36px; widht:55px;">
                            <label for="">Jumlah : </label>
                            <button class="btn btn-primary">+</button><input class="col-sm-1"
                                type="text"><button class="btn btn-primary"
                            >-</button>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <td>
                                @if (Auth::guard('pelanggan')->user() != null)
                                    <form action="{{ route('beli_langsung') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                                        <input type="hidden" name="jumlah" value="1">
                                        <button class="btn btn-primary" type="submit">
                                            <ion-icon name="bag-handle-outline"></ion-icon>
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('add_keranjang', $produk->id_produk) }}" class="btn btn-primary">
                                    <ion-icon name="cart-outline"></ion-icon>
                                </a>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('template/footer')
