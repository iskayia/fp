@include('template/header')
<script>
    function showAlamat() {
            var tipe = $('#tipe_pengambilan').val()
            if (tipe == 'Dikirim ke alamat') {
                $('#alamat').show()
                $('#courier').show()
                $('#ongkir').show()
            } else {
                $('#alamat').hide()
                $('#courier').hide()
                $('#ongkir').hide()
            }
        }

        function cekOngkir() {
            var selectedOption = $('#courier_id option:selected');
            var courierCode = selectedOption.data('courier_code');
            var courierServiceCode = selectedOption.data('courier_service_code');
            var selectedAlamat = $('#id_alamat option:selected');
            var alamatPenerima = selectedAlamat.text();
            var bagianAlamat = alamatPenerima.split(", ");
            var kodePos = bagianAlamat[bagianAlamat.length - 1];
            console.log(alamatPenerima);

            // Buat objek data untuk dikirimkan ke endpoint cek ongkir
            var items = []
            // @foreach ($keranjang as $k)
            //     var item = {
            //         "id": {{ $k->id_keranjang }},
            //         "name": {{ $k->produk->nama_produk }},
            //         "image": "",
            //         "description": "",
            //         "value": {{ $k->produk->harga_produk }},
            //         "quantity": 1,
            //         "weight": {{ $k->produk->berat }}
            //     }
            //     items.push(item)
            // @endforeach


            var requestData {
                "shipper_contact_name": "Fitri Parfum",
                "shipper_contact_phone": "082134568856",
                "origin_contact_name": "Fitri Parfum",
                "origin_contact_phone": "082134568856",
                "origin_address": "Jalan Blokeng RT 04 RW 03 Serdang Wetan Legok, Kabupaten Tangerang, Serdang Wetan, Kec. Legok, Kabupaten Tangerang, Banten 15820",
                "origin_note": "",
                "origin_postal_code": "15820",
                "destination_contact_name": "nama penerima",
                "destination_contact_phone": "088213565426",
                "destination_address": alamatPenerima,
                "destination_postal_code": kodePos,
                "destination_note": "",
                "courier_company": courierCode,
                "courier_type": courierServiceCode,
                "delivery_type": "now",
                "order_note": "",
                "metadata": [],
                "items": items
            }

            // Lakukan pemanggilan Ajax ke endpoint cek ongkir
            $.ajax({
                url: '/api/cek_ongkir', // Ganti dengan URL endpoint yang sesuai
                type: 'POST', // Sesuaikan dengan metode HTTP yang digunakan
                data: requestData,
                success: function(response) {
                    // Handle respons sukses dari endpoint
                    console.log(response);
                    $('#ongkos_kirim').val(response.data)
                },
                error: function(xhr, status, error) {
                    // Handle kesalahan pemanggilan endpoint
                    console.error(error);
                }
            });
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
                            <div class="form-group" id="alamat">
                                <label for="alamat_pelanggan">Alamat</label>

                                <select class="form-control" name="id_alamat" id="id_alamat">
                                    @foreach ($pelanggan->alamat as $alamat)
                                        <option value="{{ $alamat->id_alamat }}">{{ $alamat->alamat }}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                            <div class="form-group" id="courier">
                                <label for="courier">Pilih Pengiriman</label>

                                <select class="form-control" name="courier" id="courier_id" onclick="cekOngkir()">
                                    <option value="">pilih pengiriman</option>
                                    @foreach ($couriers as $courier)
                                        <option value="{{ $courier->courier_id }}"
                                            data-courier_code="{{ $courier->courier_code }}"
                                            data-courier_service_code="{{ $courier->courier_service_code }}">
                                            {{ $courier->courier_name }}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                            <div class="form-group" id="ongkir">
                                <label for="courier">Ongkir</label>
                                <input class="form-control" type="text" value="0" name="ongkir"
                                    id="ongkos_kirim" readonly>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="courier">Total</label>
                                <input class="form-control" type="text" value="{{ $subtotal }}"
                                    name="jumlah_pebayaran" id="jumlah_pembayaran" readonly>
                            </div>
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
