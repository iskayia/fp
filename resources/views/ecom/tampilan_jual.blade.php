@include('template/header')

<script>
    function redirectToPage(url) {
        window.location.href = url;
    }


    document.addEventListener('DOMContentLoaded', function() {
        var dropdownItems = document.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(function(item) {
            item.addEventListener('click', function() {
                var gender = this.getAttribute('data-value');
                document.querySelector('#filterForm input[name="gender"]').value = gender;
                document.querySelector('#filterForm').submit();
            });
        });
    });

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
            <br>
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <form action="{{route('cari')}}" method="GET" class="d-flex">
                    <input class="form-control me-2" name="cari" type="search" placeholder="Cari" aria-label="cari">
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                  </form>
                </div>
              </nav>
            <br>
        </div>
        <div class="row row-cols-md-4 row-cols-sm-4 g-2">
            @forelse ($produk as $p)
                <div class="col-sm-6" onclick="redirectToPage('{{ route('detail_produk', $p->id_produk) }}')">
                    <div class="card  image-container">
                        <img class="img-fluid img-thumbnail" style="object-fit: cover;height: 300px;widht:300px;"
                            src="gambar/{{ $p->gambar_produk }}" alt="Produk Fitri Parfume">

                          <a href="{{ route('add_keranjang', $p->id_produk) }}"
                            class="btn btn-primary image-button">Tambah ke Kerajang<ion-icon name="cart-outline"></ion-icon></a>
                            
                        <div class="card-body">
                            <h6 class="card-title">{{ $p->nama_produk }}</h6>
                            <i class="bi bi-star-fill" style="color: orange; text-size:8px;"></i><span class="portfolio-caption-subheading text-muted" style="font-size:9px;">3,5</span>
                            <h6 class="card-text" style="color: orange; font-size:26px;"> Rp.{{ number_format($p->harga_produk) }}
                            </h6>
                            <p class="portfolio-caption-subheading text-muted" style="font-size: 9px;"> Stok : {{ $p->stok }}</p>                          
                        </div>
                            <button type="button" class="btn btn-primary image-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              Tambah ke Keranjang</button>
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

{{-- modal perintah login jika belum login --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Perhatian!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Harap Masuk Akun
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
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


{{-- <form>
    <div class="input-group no-border">
      <input type="text" value="" class="form-control" placeholder="Search...">
      <div class="input-group-append">
        <div class="input-group-text">
          <i class="nc-icon nc-zoom-split"></i>
        </div>
      </div>
    </div>
  </form> --}}


@include('template/footer')
