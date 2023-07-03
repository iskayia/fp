@include('template/header')

<script>
    function redirectToPage(url) {
        window.location.href = url;
    }
</script>
<!-- Masthead-->
<header class="">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                aria-label="Slide 7"></button>
        </div>
        <div class="carousel-inner " role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('tempenjualan/assets/img/jumbo1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('tempenjualan/assets/img/jumbo2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('tempenjualan/assets/img/jumbo3.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('tempenjualan/assets/img/jumbo4.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('tempenjualan/assets/img/jumbo5.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('tempenjualan/assets/img/jumbo6.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('tempenjualan/assets/img/parfume.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- <div class="container">
            <div class="">Selamat Datang di Fitri Parfum!</div>
            <div class="masthead-heading text-uppercase">Warnai Harimu dengan Aroma yang menyegarkan</div>
            @if (Auth::user() == null)
<a class="btn btn-primary btn-xl text-uppercase" href="{{ route('login') }}">Login untuk Telusuri Lebih Lanjut</a>
@endif
        </div> -->
</header>

<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Fitri Parfum</h2>
            <h3 class="section-subheading text-muted">Belanja tanpa pakai ribet lagi. Yuk beli parfum disini</h3>
        </div>
        <div class="row text-justify">
            <div class="col-md-4">
                <img class="img-fluid " style="object-fit: cover;height: 300px;"
                    src="{{ asset('tempenjualan/assets/img/vector6.png') }}" alt="temukan produk">
                <!-- <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                </span> -->
                <h4 class="my-3">Temukan Parfum</h4>
                <p class="text-muted">Temukan arfum yang akan anda beli </p>
            </div>
            <div class="col-md-4">
                <img class="img-fluid " style="object-fit: cover;height: 300px;"
                    src="{{ asset('tempenjualan/assets/img/vector2.png') }}" alt="temukan produk">
                <h4 class="my-3">Beli Parfum</h4>
                <p class="text-muted">Masukkan ke keranjang belanja atau beli parfum yang kamu akan pesan</p>
            </div>
            <div class="col-md-4">
                <img class="img-fluid " style="object-fit: cover;height: 300px;"
                    src="{{ asset('tempenjualan/assets/img/vector1.png') }}" alt="temukan produk">
                <h4 class="my-3">Bayar pesanan</h4>
                <p class="text-muted">Lakukan pembayaran untuk pembelian</p>
            </div>
        </div>
    </div>
</section>
<!-- disini list tampilan produk-->
<section class="page-section bg-light" id="produk">
    <div class="container">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase ">Produk Toko kami</h2>
                <h3 class="section-subheading text-muted border-bottom"></h3>
            </div>
            <div class="drop-down"></div>
            <button class="btn btn-primary"><i class="bi bi-list-ul"></i></button>
            <br>
            <div class="navbar navbar-light bg-light">
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Cari">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <br>
        </div>
        <div class="row row-cols-md-4 row-cols-sm-4 g-2">
            @forelse ($produk as $p)
                <div class="col-sm-6" onclick="redirectToPage('{{ route('detail_produk', $p->id_produk) }}')">
                    <div class="card  image-container">
                        <img class="img-fluid img-thumbnail" style="object-fit: cover;height: 300px;widht:300px;"
                            src="gambar/{{ $p->gambar_produk }}" alt="Produk Fitri Parfume">
                        <a href="{{ route('add_keranjang', $p->id_produk) }}"
                            class="btn btn-primary image-button">Tambah
                            ke Kerajang<ion-icon name="cart-outline"></ion-icon></a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->nama_produk }}</h5>
                            <h6 class="card-text" style="color: orange;"> Rp.{{ number_format($p->harga_produk) }}
                            </h6>
                            <p class="portfolio-caption-subheading text-muted"> Stok : {{ $p->stok }}</p>
                        </div>
                    </div>

                </div>
            @empty
                <div class="alert alert-danger">
                    Data Post belum Tersedia.
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Tentang</h2>
        </div>
        <div class="row text-justify ">
            <div class="col-md-2">
                <h5 class=" text-muted text-justify">Lokasi Toko Fitri Parfum</h5>
                <p class="text-muted">Jalan Blokeng RT 04 RW 03 Serdang Wetan Legok, Kabupaten Tangerang, Serdang
                    Wetan, Kec. Legok, Kabupaten Tangerang, Banten 15820</p>
            </div>
            <div class="col-md-4">
                <img class="img-fluid " style="object-fit: cover;height: 300px;"
                    src="{{ asset('tempenjualan/assets/img/vector4.png') }}" alt="lokasi kami">
            </div>
            <div class="col-md-4">
                <img class="img-fluid " style="object-fit: cover;height: 300px;"
                    src="{{ asset('tempenjualan/assets/img/vector3.png') }}" alt="lokasi kami">
            </div>
            <div class="col-md-2 text-justify">
                <h5 class=" text-muted">Jam Operasional</h5>
                <p class="text-muted">Senin - Minggu. 09.00 - 23.00</p>
            </div>

        </div>
    </div>
</section>

<!-- Footer-->
<footer class="footer py-4 border-top">
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

<!-- selamat datang modals -->

<div class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" id="modalChoice">
    <div class="modal-dialog">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Selamat Datang di Fitri Parfum!</h5>
                <p class="mb-0">Mari cari parfum yang kamu sukai dan warnai harimu dengan aroma yang menyegarkan </p>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <button type="button " data-bs-dismiss="modal"
                    class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end"><strong>Oke!</strong></button>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Modals-->
<!-- Portfolio item 1 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="gambar/{{ $p->gambar_produk }}"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="gambar/{{ $p->gambar_produk }}"
                                alt="..." />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
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
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                type="button">
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

<script>
    $(document).ready(function() {
        var modalChoice = document.getElementById('modalChoice');
        modalChoice.show()

    })
</script>

@include('template/footer')
