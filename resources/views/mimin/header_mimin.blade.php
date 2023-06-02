<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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