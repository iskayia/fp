@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h3 class="description">Penjualan</h3>
            <div class="card">
            <div class="card-header">
                                <div class="">
                                    <div class="pull-left">
                                        <h4 class="card-title">Tabel Penjualan</h4>
                                    </div>
                                    <div class="pull-right"><a href="{{route('add_pengeluaran')}}" class="btn btn-info btn-sm">
                                            <i class="nc-icon nc-simple-add text-white"> Tambah Penjualan</i></a></div>
                                </div>
                            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>No</th>
                                <th>Produk</th>
                                <th>Jumlah Produk Terjual</th>
                                <th>Tanggal Penjualan</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                $n = 1;
                                @endphp
                                @foreach($penjualan as $p)
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td>{{$p->nama_produk}}</td>
                                    <td>{{$p->jumlah_penjualan}}</td>
                                    <td>{{$p->tgl_penjualan}}</td>
                                    <td>200</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="nc-icon nc-bullet-list-67"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="#"><i class="nc-icon nc-settings"></i> Edit</a>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#">
                                                    <i class="nc-icon nc-basket"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin akan menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="#" class="btn btn-primary">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('mimin/footer_mimin')