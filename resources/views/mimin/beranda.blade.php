<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
        /* Style the sidenav links and the dropdown button */
        .sidenav a,
        .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 14px;
            color: #818181;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        /* On mouse-over */
        .sidenav a:hover,
        .dropdown-btn:hover {
            color: #f1f1f1;
        }

        /* Add an active class to the active dropdown button */
        .active {
            background-color: orange;
            color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #ddd;
            padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="{{ route('mimin') }}" class="simple-text logo-normal">
                    <div class="logo-image-small">
                        <img src="{{ asset('tempenjualan/assets/img/logo1.png') }}">
                    </div>
                </a>
            </div>
            <div class="sidebar-wrapper sidenav ">
                <ul class="nav">
                    {{-- pakai ini jika ingin di aktifkan, maka akan berwarna<li class="active "> --}}
                    <li>
                        <a href="{{ route('mimin') }}">
                            <i class="nc-icon nc-bank" style="color:#f1f1f1;"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <div class="border-top">
                        <button class="dropdown-btn no-border">Master Data
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <li>
                                <a href="{{ route('data') }}">
                                    <i class="nc-icon nc-box"></i>
                                    <p>Data Produk</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('supplier') }}">
                                    <i class="nc-icon nc-badge"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pelanggan') }}">
                                    <i class="nc-icon nc-badge"></i>
                                    <p>Pelanggan</p>
                                </a>
                            </li>
                        </div>
                    </div>

                    <div class="border-top">
                        <button class="dropdown-btn no-border">Transaksi
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <li>
                                <a href="{{ route('pembelian') }}">
                                    <i class="nc-icon nc-cloud-download-93"></i>
                                    <p>Pembelian</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('penjualan') }}">
                                    <i class="nc-icon nc-cloud-upload-94"></i>
                                    <p>Penjualan</p>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div class="border-top">
                        <li>
                            <a href="{{ route('laporan') }}">
                                <i class="nc-icon nc-paper" style="color: #f1f1f1;"></i>
                                <p>Laporan </p>
                            </a>
                        </li>
                    </div>

                    {{-- <div class="border-top">
                        <button class="dropdown-btn no-border">Laporan
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <li>
                                <a href="{{ route('laporan') }}">
                                    <i class="nc-icon nc-paper"></i>
                                    <p>Laporan </p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('laporan_pembelian') }}">
                                    <i class="nc-icon nc-paper"></i>
                                    <p>Laporan Pembelian</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="nc-icon nc-paper"></i>
                                    <p>Laporan Keuangan</p>
                                </a>
                            </li>
                        </div>
                    </div> --}}
                </ul>
            </div>
        </div>


        @include('mimin/nav_mimin')

        <div class="content">
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-title">Pembelian & Penjualan</h5>
                            <p class="card-category">Line Chart with Points</p>
                        </div>
                        <div class="card-body">
                            <canvas id="chart" width="400" height="100">
                            </canvas>
                            
                        </div>
                        <div class="card-footer">
                            <div class="chart-legend">
                                <i class="fa fa-circle text-info"></i> Tesla Model S
                                <i class="fa fa-circle text-warning"></i> BMW 5 Series
                            </div>
                            <hr />
                            <div class="card-stats">
                                <i class="fa fa-check"></i> Data information certified
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
{{--  <div class="row">
                <div class="col-md-12 shadow" style="background: white;">
                    <canvas id="myChart"></canvas>
                </div>
            </div> --}}
            <br>
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
                                        <td><a href="{{ route('add_stok', $p->id_produk) }}"
                                                class="btn btn-info btn-sm"> Tambah
                                                Stok</i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- <script>
            var labels = {!! json_encode($labels) !!};
            var totals = {!! json_encode($totals) !!};
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Penjualan',
                        data: totals,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script> --}}

        @include('mimin/footer_mimin')
