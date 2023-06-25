@include('template/header')
<script>
    function showAlamat() {
        var tipe = $('#tipe_transaksi').val()
        if (tipe == 'antar-produk') {
            $('#alamat').show()
        } else {
            $('#alamat').hide()
        }
    }
</script>
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="card-body">

        <div class="container">
            <a href="{{ route('index') }}" class="btn btn-primary">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
            <br>

            <div class="card border-0 shadow rounded">
                <form action="{{ route('beli_action') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <td scope="col"></td>
                                        <th scope="col">Produk</th>
                                        <td scope="col"></td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $no = 0;
                                    @endphp
                                    @forelse ($keranjang as $k)
                                        @php
                                            $subtotal += $k->produk->harga_produk * $k->jumlah;
                                            $no++;
                                        @endphp
                                        <tr class="text-center">
                                            <td scope="col"> <img class="img-thumbnail"
                                                    style="object-fit: cover;height: 150px;"
                                                    src="gambar/{{ $k->produk->gambar_produk }}"
                                                    alt="Produk Fitri Parfume">
                                            </td>
                                            <td scope="col">{{ $k->jumlah }}</td>
                                            <td scope="col">{{ $k->produk->harga_produk * $k->jumlah }}</td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse
                                    <tr>
                                        <td><b>Subtotal</b></td>
                                        <td colspan="1" class="text-right"></td>
                                        <td>Rp.<span id="subtotal">{{ $subtotal }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="col-md-6 offset-md-3">

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Cara Pembayaran</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_jenis_pembayaran">
                                    @foreach ($jenis_pembayaran as $j)
                                        <option value="{{ $j->id_jenis_pembayaran }}">{{ $j->jenis_pembayaran }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="tipe_transaksi">Tipe Pemangambilan Produk</label>

                                <select class="form-control" id="tipe_pengambilan" name="tipe_pengambilan"
                                    onclick="showAlamat()">
                                    <option value="Ambil ke toko">Ambil ke Toko</option>
                                    <option value="Dikirim ke alamat">Dikirim ke Alamat</option>
                                </select>

                            </div>
                            <br>
                            <div class="form-group">
                                <label for="alamat_pelanggan">Alamat</label>
                                <select class="form-control" name="id_alamat" id="">
                                    @foreach ($pelanggan->alamat as $alamat)
                                        <option value="{{ $alamat->id_alamat }}">{{ $alamat->alamat }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <br>
                            <div class="form-group">
                                <p class="text-justify" style="font-size: small; color:grey; ">Harap dicatat bahwa
                                    pesanan tidak dapat diubah atau dibatalkan setelah diproses.
                                    Harap dicatat bahwa proses pengiriman pesanan anda dalam 3 hari kerja setelah
                                    pesanan Anda dikirimkan.</p>
                            </div>
                            <button class="btn btn-danger">
                                <ion-icon name="bag-check-outline"></ion-icon> Beli Sekarang
                            </button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</section>

@include('template/footer')
<script>
    $(document).ready(function() {
        showAlamat()
    })
</script>
