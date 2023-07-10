@include('template/header')
<section class="page-section center " id="services" style="background-color:#FEFCF3; height:100%; ">
    <h3 style="text-align: center;">Detail Produk</h3>
    <br>
    <div class="card-body border-down" style="display: flex; justify-content: center; align-items: center;">
        <a href="{{route('index')}}" class="btn"><i class="bi bi-arrow-left-circle-fill"></i></a>
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
                        <p class="portfolio-caption-subheading text-muted" style="font-size:11px;">Terjual : 165 pcs</p>
                        <h5 class="card-text" style="color: orange; "> Rp.{{ number_format($produk->harga_produk) }}</h5>
                        <p class="card-text" style="text-align: justify; font-size: 15px;">{{ $produk->deskripsi }}</p>
                        <div class=""  style="height: 36px; widht:55px;">
                            <label for="">Jumlah : </label>
                            <input class="col-sm-1" type="number">
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <a href="{{ route('add_keranjang', $produk->id_produk) }}" class="btn btn-primary">
                                    <ion-icon name="cart-outline"></ion-icon>
                                </a>
                            </div>
                            <br>
                            <div class="col-md-1">
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
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h4 class="text-center">Komentar</h4>
                        <div class="row">
                            <div class="col-md-12 border-top ">
                                <label for="">Anonym</label>
                                <i class="bi bi-star-fill" style="color: orange; text-size:8px;"></i><span class="portfolio-caption-subheading text-muted" style="font-size:9px;">3,5</span>
                                <p> wah bagus</p>
                            </div>
                            <div class="col-md-12 border-top ">
                                <label for="">Anon</label>
                                <i class="bi bi-star-fill" style="color: orange; text-size:8px;"></i><span class="portfolio-caption-subheading text-muted" style="font-size:9px;">4</span>
                                <p> nice</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('template/footer')
