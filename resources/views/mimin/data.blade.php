@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h3 class="description">Data Produk</h3>
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <div class="pull-left"><a href="{{ route('add_data') }}" class="btn btn-info btn-sm">
                                <i class="nc-icon nc-simple-add text-white"> Tambah Produk</i></a>
                        </div>
                    </div>
                    <nav class="navbar">
                        <div class="container-fluid">
                            <form action="{{ route('cari_adm') }}" method="GET" class="d-flex">
                                <input class="form-control me-2" name="cari_adm" type="search" placeholder="Ketik Nama Produk"
                                    aria-label="cari">
                                <button class="btn btn-outline-success" type="submit"><i
                                        class="bi bi-search"></i></button>
                            </form>
                        </div> 
                    </nav>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>No</th>
                                <th>Supplier</th>
                                <th>Produk</th>
                                <th>Berat</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Gambar Produk</th>
                                <th>Deskripsi Produk</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($produk as $p)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $p->nama_supplier }}</td>
                                        <td>{{ $p->nama_produk }}</td>
                                        <td>{{$p->berat}}gr</td>
                                        <td>{{ $p->stok }}</td>
                                        <td>{{ $p->harga_produk }}</td>
                                        <td>
                                            <img src="gambar/{{ $p->gambar_produk }}" width="100" height="100"
                                                alt="{{ $p->gambar_produk }}">
                                        </td>
                                        <td class="text-justify">{{ $p->deskripsi }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="nc-icon nc-bullet-list-67"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit_data', $p->id_produk) }}"><i
                                                            class="nc-icon nc-settings"></i> Edit</a>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#modalDelete{{ $p->id_produk }}">
                                                        <i class="nc-icon nc-basket"></i> Delete
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modalDelete{{ $p->id_produk }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin akan menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="{{ route('hapus_data', $p->id_produk) }}"
                                                                class="btn btn-primary">Delete</a>
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
</div>

@include('mimin/footer_mimin')
