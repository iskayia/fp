@include('template/header')
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="card-body" id="detailtransaksi">
        <div class="container shadow-sm" style="background-color:white;">
            <img src="{{ asset('tempenjualan/assets/img/logo2.png') }}" style="width:25%;" class="mx-auto d-block"
                alt="logo fitri parfum" />
            <br>
            <h3 style="text-align: center;">Detail Transaksi</h3>
            <br>
            <div class="container border-top">
                <!-- bagian informasi pelanggan -->
                @php
                    $subtotal = 0;
                    $no = 0;
                @endphp
                @php
                    $subtotal += $penjualan->harga_produk * $penjualan->jumlah_penjualan;
                    $no++;
                @endphp
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th></th>
                            <td class="w-25 p-3">Nama</td>
                            <td>:</td>
                            <td class="w-50 p-3">{{ $penjualan->pelanggan->nama_pelanggan }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="w-25 p-3">Tanggal Transaksi</td>
                            <td>:</td>
                            <td class="w-50 p-3">{{ $penjualan->tgl_penjualan }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="w-25 p-3">Tipe Pengambilan</td>
                            <td>:</td>
                            <td class="w-50 p-3">{{ $penjualan->tipe_pengambilan }}</td>
                        </tr>
                        @if (isset($penjualan->alamat->alamat) && $penjualan->tipe_pengambilan == 'Dikirim ke alamat')
                        <tr>
                            <th></th>
                            <td class="w-25 p-3">Alamat</td>
                            <td>:</td>
                            <td class="w-50 p-3">{{ $penjualan->alamat->alamat }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="w-25 p-3">Pengiriman</td>
                            <td>:</td>
                            <td class="w-50 p-3">{{ $penjualan->courier->courier_name }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="w-25 p-3">Ongkos Kirim</td>
                            <td>:</td>
                            <td class="w-50 p-3">{{ number_format( $penjualan->pembayaran->ongkir) }}</td>
                        </tr>
                        @endif
                       
                    </table>
                </div>
                <br>
                <!-- informasi produk yang di beli -->
                <div class="card-body border-top">
                    <table class="table">
                        <thead class="text-center">
                            <th>No</th>
                            <th>Produk</th>
                            <th>Jumlah Pembelian</th>
                            <th>Harga satuan</th>
                            <th>Total Harga</th>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($penjualan->produk_penjualan as $produk_penjualan)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $produk_penjualan->produk->nama_produk }}</td>
                                    <td>{{ $produk_penjualan->qty }}</td>
                                    <td>{{ number_format($produk_penjualan->produk->harga_produk) }}</td>
                                    <td>{{ number_format($produk_penjualan->qty * $produk_penjualan->produk->harga_produk) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="card-body  border-top">
                    <h4 style="text-align: right;">Total : Rp.
                        {{ number_format($penjualan->pembayaran->jumlah_pembayaran) }} </h4>
                        <br>
                        <h6 style="text-align: right;" > Keterangan Pembayaran : 
                            {{$penjualan->pembayaran->status_pembayaran}}
                        </h6>
                        <br>
                        <h6 style="text-align: right;">{{$penjualan->status_transaksi}}</h6>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card-body" style="text-align: right; margin-bottom: 30px">
        @if ($penjualan->pembayaran->status_pembayaran == 'Menunggu Pembayaran' && $penjualan->pembayaran->id_jenis_pembayaran == '2')
        <a href="{{ route('bayar', $penjualan->id_penjualan) }}" class="btn btn-primary btn-lg no-print"> 
            <i class="fa fa-credit-card" aria-hidden="true"></i>Bayar</a>
        @endif
        @if ($penjualan->pembayaran->id_jenis_pembayaran != '2' && $penjualan->pembayaran->id_jenis_pembayaran != '1')
        <a href="{{ route('bayar', $penjualan->id_penjualan) }}" class="btn btn-primary btn-lg no-print"> 
            <i class="fa fa-credit-card" aria-hidden="true"></i> Upload Bukti Bayar</a>
        @endif
        <a href="#" onclick="printDiv('detailtransaksi');" class="btn btn-primary btn-lg no-print">
            <i class="fa fa-print" aria-hidden="true"></i> Print
        </a>
        <a href="{{ route('list_transaksi') }}" class="btn btn-danger btn-lg no-print">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
        </a>
    </div>
</section>
@include('template/footer')
