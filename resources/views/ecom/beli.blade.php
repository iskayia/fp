@include('template/header')

<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="card-body">

        <div class="container">
            <a href="{{route('index')}}" class="btn btn-primary"><ion-icon name="arrow-back-outline"></ion-icon></a>
            <br>

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="col-md-6 offset-md-3">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <td scope="col"></td>
                                    <th scope="col">Produk</th>
                                    <td scope="col"></td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="text-center">
                                    <td scope="col">gambar</td>
                                    <td scope="col">jumlah</td>
                                    <td scope="col">harga</td>
                                </tr>
                                <tr>
                                    <td><b>Subtotal</b></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td>Rp.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('template/footer')