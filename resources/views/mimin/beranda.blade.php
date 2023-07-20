@include('mimin/header_mimin')
@include('mimin/nav_mimin')

<div class="content">
    @if (Auth::user()->level == 'Pimpinan')
    <div>
        <canvas id="myChart"></canvas>
      </div>
      @endif
    <br>
    @if (Auth::user()->level == 'Admin')
    <div class="row">
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <h4 class="text-danger">Stok Produk Berkurang!</h4>
                    <p class="portfolio-caption-subheading text-muted" style="font-size: 10px;">Harap untuk
                        membeli lagi produk yang kurang</p>
                    <thead class="text-primary">
                        <th>No</th>
                        <th>Produk</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($produk as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->stok }}</td>
                                <td><a href="{{ route('add_stok', $p->id_produk) }}" class="btn btn-info btn-sm"> Tambah
                                        Stok</i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['januari', 'februari', 'maret', 'april', 'mei', 'juni','juli','agustus','september','oktober','november','desember'],
      datasets: [
        {
          label: 'Penjualan',
          data: [{{$januari}}, {{$februari}},{{$maret}},{{$april}},{{$mei}},{{$juni}},{{$juli}},{{$agustus}},{{$september}},{{$oktober}},{{$november}},{{$desember}}],
          borderWidth: 1
        },
        {
          label: 'Pembelian',
          data: [{{$januari_pembelian}}, {{$februari_pembelian}},{{$maret_pembelian}},{{$april_pembelian}},{{$mei_pembelian}},{{$juni_pembelian}},{{$juli_pembelian}},{{$agustus_pembelian}},{{$september_pembelian}},{{$oktober_pembelian}},{{$november_pembelian}},{{$desember_pembelian}}],
          borderWidth: 1
        }
      ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@include('mimin/footer_mimin')
