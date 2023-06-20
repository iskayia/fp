@include('template/header')
<script>
    function hitung(data) {
        $qty = data.value;
        $harga = data.getAttribute('data-harga');
        $id = data.getAttribute('id')
        console.log($harga * $qty)
        $('#jumharga' + $id).html($harga * $qty)
        $('#jumlahproduk' + $id).val($qty)
        $subtotal = 0;
        $('.harga').each(function(x, y) {
            console.log($(this).text())
            $subtotal += parseInt($(this).text())
        })
        $('#subtotal').html($subtotal)
    }
</script>
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="container">
        <a href="{{route('index')}}" class="btn btn-primary"><ion-icon name="arrow-back-outline"></ion-icon></a>
        <br>
        <div class="card border-0 shadow rounded">
            <div class="card-body">

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col"></th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $subtotal=0;
                        $no=0;
                        @endphp
                        @forelse ($keranjang as $k)
                        @php
                        $subtotal+= $k->harga_produk * $k->jumlah;
                        $no++;
                        @endphp
                        <tr>
                            <th scope="row">{{$no}}</th>
                            <td>
                                <img class="img-thumbnail" style="object-fit: cover;height: 150px;" src="gambar/{{$k->gambar_produk}}" alt="Produk Fitri Parfume">
                            </td>
                            <td>{{$k->nama_produk}}</td>
                            <td>
                                <input onchange="hitung(this)" id="{{$k->id_produk}}" data-harga="{{$k->harga_produk}}" type="number" value="{{$k->jumlah}}" min='1' style="width:45px;">
                            </td>
                            <td>{{$k->harga_produk}}</td>

                            <td class="harga" id='jumharga{{$k->id_produk}}'>{{$k->harga_produk * $k->jumlah}}</td>
                            <td class="col">
                                
                                <form action="{{route('beli_langsung')}}" method="POST" class="d-flex">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="id_produk" value="{{$k->id_produk}}">
                                    <input type="hidden" name="jumlah" id='jumlahproduk{{$k->id_produk}}' value="{{$k->jumlah}}">
                                    <button class="btn btn-primary" type="submit"><ion-icon name="bag-handle-outline"></ion-icon></button>
                                </form>
                                <br>
                                <form action="" class="d-flex">
                                    <button class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Post belum Tersedia.
                        </div>
                        @endforelse
                        <tr>
                            <td colspan="4" class="text-right"></td>
                            <td><b>Subtotal</b></td>
                            <td>Rp. <span id="subtotal">{{$subtotal}}</span></td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>

                <a href="{{route('beli')}}" class="btn btn-danger" style="float:right">Beli Sekarang</a>


            </div>
        </div>



    </div>
</section>

@include('template/footer')