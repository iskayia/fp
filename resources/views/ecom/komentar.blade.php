@include('template/header')
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="card-body" id="detailtransaksi">
        <div class="container shadow-sm" style="background-color:white;">
            <a href="{{route('list_transaksi')}}" class="btn"><i class="bi bi-arrow-left-circle-fill"></i></a>
            <h5 style="text-align: center;">Beri komentar</h5>
            <br>
            <div class="container border-top">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Komentar</label>
                                <div>
                                    <input class="form-control" id="formFileSm" type="text" name="komentar">
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-2  ml-auto mr-auto ">
                            <label for=""></label><br>
                            <a href="#" class="btn btn-primary btn-round">Simpan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('template/footer')
