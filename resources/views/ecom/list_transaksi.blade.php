@include('template/header')

<div class="container" >
    <main role="main" class="container">
        <section class="page-section " id="services" >
    <a href="{{route('index')}}" class="btn btn-primary"><ion-icon name="arrow-back-outline"></ion-icon></a>
            <br>
<div class="my-3 p-3 bg-white rounded shadow-sm" >
    <h6 class="border-bottom border-gray pb-2 mb-0">List Transaksi</h6>
    @foreach ($penjualan as $p)
    <div class="media text-muted pt-3">
    <img class="img-thumbnail" style="object-fit: cover;height: 75px;" src="gambar/{{$p->produk_penjualan[0]->produk->gambar_produk}}" alt="Produk Fitri Parfume">
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">{{$p->produk_penjualan[0]->produk->nama_produk}}</strong>
          <a href="{{route('detail_transaksi',$p->id_penjualan)}}" >Detail Transaksi</a>
        </div>
        <span class="d-block">Rp.{{$p->produk_penjualan[0]->produk->harga_produk}}</span>
        @if(Auth::guard('pelanggan')->user() != null)
                    <form action="{{route('beli_langsung')}}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id_produk" value="{{$p->produk_penjualan[0]->id_produk}}">
                        <input type="hidden" name="jumlah" value="1">
                        <button class="btn btn-primary" type="submit"><ion-icon name="bag-handle-outline"></ion-icon> Beli Lagi</button>
                        <a href="{{route('komentar',$p->id_penjualan)}}" class="btn btn-primary">Beri Komentar</a>
                    </form>
                    @endif 
      </div>
    </div>
    @endforeach
  </div>
</section>
</main>
</div>
  @include('template/footer')