<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Laporan Pembelian</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />

</head>

<body>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <div class="container d-flex justify-content-center">
        <div class="row col-md-12 d-flex justify-content-center" id="PRINTLAPORAN">
            <div align="center" style="width:100%">
                <!--                                 <table>
                                        <tr>
                                            <td>
                                               <img src="../assets/img/logolp3i2.png" width="7%" style="position: absolute; left: 30px; margin-top: -3px;"> 
                                            </td>
                                        </tr>
    
                                    
                                    </table> -->


                <h3 style="font-weight: bold;">LAPORAN PEMBELIAN</h3>
                <H3 style="font-weight: bold;">TOKO FITRI PARFUM</H3>
                <H3 style="font-weight: bold;">TANGERANG</H3>
                <p>Jalan Blokeng RT 04 RW 03 Serdang Wetan Legok, Kabupaten Tangerang,
                    Serdang Wetan, Kec. Legok, Kabupaten Tangerang, Banten 15820.
                    Office (021) 12345678 </p>

                <hr>
            </div>
            <table class=" table table-bordered display nowrap fixed" id="tabel-data" style="font-size: 16px; text-align:center; border-collapse: collapse; " id="tabel-data">
                <col width="90px">
                <col width="150px">
                <col width="150px">
                <col width="150px">
                <col width="150px">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Pembelian </th>
                        <th>Tanggal Pembelian</th>
                        <th>Harga Pembelian</th>

                    </tr>
                </thead>
                <!-- <tbody> -->
                    @php
                    $n = 1;
                    @endphp

                    @foreach($pembelian as $p)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$p->nama_produk}}</td>
                        <td>{{$p->jumlah_pembelian}}</td>
                        <td style="text-align: center">@php
                            $date=date_create($p->tgl_pembelian);
                        @endphp
                            {{ date_format( $date,"d F Y") }}
                        </td>
                        <td>Rp. {{number_format($p->harga_pembelian)}}</td>
                    </tr>
                    @endforeach
                <!-- </tbody> -->
            </table>
            <br>

            <table width="100%">
                <tr>
                    <td></td>
                    <td width="200px">
                        <p>Tangerang, <?php echo date('d M Y'); ?><br>Admin Toko Fitri Parfum,</p>
                        <br>
                        <br>
                        <br>
                        <p>_________________________</p>
                    </td>
                </tr>
            </table>
            <br>


        </div>

    </div>

    </div>
    <div align="center" style="margin-bottom: 40px">
        <a href="#" onclick="printDiv('PRINTLAPORAN');" class="btn btn-primary btn-lg no-print">
            <i class="fa fa-print" aria-hidden="true"></i> Print
        </a>
        <a href="{{route('laporan')}}"  class="btn btn-danger btn-lg no-print">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
        </a>
</body>

</html>