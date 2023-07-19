@include('template/header')
<script>
    function showAlamat() {
        var tipe = $('#tipe_pengambilan').val()
        if (tipe == 'Dikirim ke alamat') {
            $('#alamat').show()
            $('#courier').show()
        } else {
            $('#alamat').hide()
            $('#courier').hide()
        }
    }

    function hitung(data) {
        $qty = data.value;
        $harga = data.getAttribute('data-harga');
        $id = data.getAttribute('id')
        console.log($harga * $qty)
        $('#jumharga').html($harga * $qty)
        $('#subtotal').html($harga * $qty)
        $('#jumlah_pembayaran').val($harga * $qty)
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
                <form action="{{ route('bayar_langsung') }}" method="POST">
                    @csrf
                    @method('POST')
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
                                    <tr class="text-center">
                                        <td scope="col">
                                            <img class="img-thumbnail" style="object-fit: cover;height: 150px;"
                                                src="gambar/{{ $produk->gambar_produk }}" alt="Produk Fitri Parfume">
                                            <br>
                                            <label for="">{{ $produk->nama_produk }}</label>
                                        </td>
                                        <td scope="col">
                                            <input onchange="hitung(this)" id="jumlah" name="jumlah"
                                                data-harga="{{ $produk->harga_produk }}" type="number"
                                                value="{{ $jumlah }}" min='1' style="width:45px;">
                                        </td>
                                        <td scope="col" id="jumharga">{{ $produk->harga_produk * $jumlah }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Subtotal</b></td>
                                        <td colspan="1" class="text-right"></td>
                                        @php
                                            $subtotal = $produk->harga_produk * $jumlah;
                                        @endphp
                                        <td>Rp.<span id="subtotal">{{  $subtotal }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="col-md-6 offset-md-3">

                            <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
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
                                <label for="tipe_pengambilan">Tipe Pemangambilan Produk</label>

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
                                    <option value="">Pilih Alamat</option>
                                    @foreach ($pelanggan->alamat as $alamat)
                                        <option value="{{ $alamat->id_alamat }}">{{ $alamat->alamat }}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                            <div class="form-group" id="courier">
                                <label for="courier">Pilih Pengiriman</label>

                                <select class="form-control" name="courier" id="courier_id">
                                    <option value="">pilih pengiriman</option>
                                    @foreach ($couriers as $courier)
                                        <option value="{{ $courier->courier_id }}"
                                            data-courier-code="{{ $courier->courier_code }}"
                                            data-courier-service-code="{{ $courier->courier_service_code }}">
                                            {{ $courier->courier_name }}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                            <div class="form-group" id="ongkir">
                                <label for="courier">Ongkir</label>
                                <input class="form-control" type="number" value="0" name="ongkir"
                                    id="ongkos_kirim" readonly>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="courier">Total</label>
                                <input class="form-control" type="text" value="{{ $subtotal }}"
                                    name="jumlah_pembayaran" id="jumlah_pembayaran" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <p class="text-justify" style="font-size: 11px; color:grey; ">Harap dicatat bahwa
                                    pesanan tidak dapat diubah atau dibatalkan setelah diproses.
                                    Harap dicatat bahwa proses pengiriman pesanan anda dalam 3 hari kerja setelah
                                    pesanan Anda dikirimkan.</p>
                            </div>
                            <button type="submit" class="btn btn-danger" style="float:right">Beli Sekarang</button>
                            <br>
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
        $('#tipe_pengambilan').change(function() {
            var tipe = $('#tipe_pengambilan').val()
            if (tipe == 'Dikirim ke alamat') {
                $('#alamat').show()
                $('#courier').show()
                $('#ongkir').show()
            } else {
                $('#alamat').hide()
                $('#courier').hide()
                $('#ongkir').hide()
                $('#jumlah_pembayaran').val({{$subtotal}})
            }
        })
        $('#courier_id').change(function() {
            // Mengambil data dari input
            var selectedOption = $(this).find('option:selected');
            var courierCode = selectedOption.data('courier-code');
            var courierServiceCode = selectedOption.data('courier-service-code');

            console.log("cek ongkir")
            //var address = $('#id_alamat').find('option:selected').text()   
            var selectedAlamat = $('#id_alamat option:selected');
            var alamatPenerima = selectedAlamat.text();
            var bagianAlamat = alamatPenerima.split(", ");
            var kodePos = bagianAlamat[bagianAlamat.length - 1];         
            var items = [];
            var item = {
                id: {{ $produk->id_produk }},
                name: "{{ $produk->nama_produk }}",
                image: "",
                description: "",
                value: {{ $produk->harga_produk }},
                quantity: {{ $jumlah }},
                weight: {{ $jumlah * $produk->berat }}
            };
            items.push(item);
            var requestData = {
                contact_name: "fitri pelanggan",
                contact_phone: "08872121",
                address: alamatPenerima,
                postal_code: kodePos,
                "note": "",
                "courier_code":courierCode,
                "courier_service_code": courierServiceCode,
                "items": items
            }

            // Mengirim permintaan ke API menggunakan AJAX
            $.ajax({
                url: '/api/cek_ongkir',
                type: 'POST',
                dataType: 'json',
                data: requestData,
                success: function(response) {
                    console.log(response)
                    if (response.error_code === 200) {
                        // Memperbarui nilai input dengan harga yang diperoleh dari respons
                        $('#ongkos_kirim').val(response.price);
                       // $('#ongkir_text').val(response.price.toLocaleString());
                       var total = parseInt({{$subtotal}}) + parseInt(response.price);
                       $('#jumlah_pembayaran').val(total)
                       console.log(total);
                    } else {
                        console.log('Terjadi kesalahan: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Terjadi kesalahan: ' + error);
                }
            });
        });
    })
</script>

