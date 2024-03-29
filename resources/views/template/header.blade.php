<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Fitri Parfum</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('tempenjualan/assets/favicon.ico')}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    {{-- icon boostrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('tempenjualan/css/styles.css')}}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{asset('tempenjualan/assets/img/logo1.png')}}" alt="logo fitri parfum" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}#produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}#about">Tentang Kami</a></li>
                    @if(Auth::guard('pelanggan')->user()!=null)
                    <li class="nav-item"><a class="nav-link" href="{{route('keranjang')}}"><ion-icon name="cart-outline"></ion-icon></a></li>
                    <div class="dropdown">
                        <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                            <li class="nav-item"><a class="nav-link" href="{{route('akun_saya')}}">Akun Saya</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('list_transaksi')}}">List Transaksi</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                    @endif
                    @if(Auth::guard('pelanggan')->user() == null)
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>