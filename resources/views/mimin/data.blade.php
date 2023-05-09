<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- bootstrap tambahan lainnya -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="{{route('mimin')}}" class="simple-text logo-normal">
                    <div class="logo-image-small">
                        <img src="{{asset('penjualan/assets/img/logo1.png')}}">
                    </div>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active ">
                        <a href="{{route('mimin')}}">
                            <i class="nc-icon nc-bank"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('data')}}">
                            <i class="nc-icon nc-box"></i>
                            <p>Data Produk</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pembelian')}}">
                            <i class="nc-icon nc-cloud-download-93"></i>
                            <p>Pembelian</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pengeluaran')}}">
                            <i class="nc-icon nc-cloud-upload-94"></i>
                            <p>Penjualan</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pelanggan')}}">
                            <i class="nc-icon nc-badge"></i>
                            <p>Pelanggan</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('supplier')}}">
                            <i class="nc-icon nc-badge"></i>
                            <p>Supplier</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('laporan')}}">
                            <i class="nc-icon nc-paper"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end header -->

        <div class="main-panel" style="height: 100vh;">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="{{route('mimin')}}">Admin</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Profil</a>
                                    <a class="dropdown-item" href="#">Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="description">Data Produk</h3>
                        <div class="card">
                            <div class="card-header">
                                <div class="">
                                    <div class="pull-left">
                                        <h4 class="card-title">Tabel Produk</h4>
                                    </div>
                                    <div class="pull-right"><a href="{{route('add_data')}}" class="btn btn-info btn-sm">
                                            <i class="nc-icon nc-simple-add text-white"> Tambah Produk</i></a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>No</th>
                                            <th>Supplier</th>
                                            <th>Produk</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Gambar Produk</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @php 
                                            $no = 1;
                                            @endphp
                                            @foreach($produk as $p)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$p->nama_supplier}}</td>
                                                <td>{{$p->nama_produk}}</td>
                                                <td>{{$p->stok}}</td>
                                                <td>{{$p->harga_produk}}</td>
                                                <td>
                                                    <img src="gambar/{{$p->gambar_produk}}" width="100" height="100" alt="{{$p->gambar_produk}}">
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="nc-icon nc-bullet-list-67"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="{{route('edit_data',$p->id_produk)}}"><i class="nc-icon nc-settings"></i> Edit</a>

                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalDelete{{$p->id_produk}}">
                                                                <i class="nc-icon nc-basket"></i> Delete
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalDelete{{$p->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    <a href="{{route('hapus_data',$p->id_produk)}}" class="btn btn-primary">Delete</a>
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

        <!-- footernih -->
        <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
            <div class="container-fluid">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="" target="_blank">Fitri Parfum</a></li>
                        </ul>
                    </nav>
                    <div class="credits ml-auto">
                        <span class="copyright">
                            © 2023, made with <i class="fa fa-heart heart"></i> by Fitri Parfum
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('admin/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{asset('admin/assets/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('admin/assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('admin/assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>
</body>

</html>