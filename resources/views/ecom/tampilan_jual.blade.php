@include('template/header')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Selamat Datang di Fitri Parfum!</div>
            <div class="masthead-heading text-uppercase">Warnai Harimu dengan Aroma yang menyegarkan</div>
            @if(Auth::user() == null)
            <a class="btn btn-primary btn-xl text-uppercase" href="{{route('login')}}">Login untuk Telusuri Lebih Lanjut</a>
            @endif
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Fitri Parfum</h2>
                <h3 class="section-subheading text-muted">Belanja tanpa pakai ribet lagi. Yuk beli parfum disini</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Temukan Parfum</h4>
                    <p class="text-muted">Temukan arfum yang akan anda beli </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Beli Parfum</h4>
                    <p class="text-muted">Masukkan ke keranjang belanja atau beli parfum yang kamu akan pesan</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-credit-card-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Bayar pesanan</h4>
                    <p class="text-muted">Lakukan pembayaran untuk pembelian</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="produk">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Produk Toko kami</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
            </div>
                <div class="row row-cols-md-4 row-cols-sm-4 g-2">
                    @forelse ($produk as $p)
                    <div class="col-sm-3">
                        <div class="card">
                            <img class="img-fluid img-thumbnail" style="object-fit: cover;height: 300px;" src="{{env('URL_IMAGE') . $p->gambar_produk}}" alt="Produk Fitri Parfume">
                            <div class="card-body">
                                <h5 class="card-title">{{$p->nama_produk}}</h5>
                                <p class="card-text">Rp.{{number_format($p->harga_produk)}}</p>
                                @if(Auth::user() != null)
                                <a href="{{route('beli')}}" class="btn btn-primary"><ion-icon name="bag-handle-outline"></ion-icon></a>
                                <a href="{{route('add_keranjang', $p->id_produk)}}" class="btn btn-primary"><ion-icon name="cart-outline"></ion-icon></a>
                                @endif
                            </div>
                        </div>

                    </div>
                    @empty
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                    @endforelse
                </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Fitri Parfum 2023</div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('penjualan/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="{{asset('penjualan/assets/img/portfolio/1.jpg')}}" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Threads
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Illustration
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @include('template/footer')