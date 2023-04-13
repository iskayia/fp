@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Tambah Supplier</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('add_supplier_action') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input type="text" class="form-control" placeholder="nama supplier" name="nama_supplier">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Supplier</label>
                                    <input type="text" class="form-control" placeholder="email" name="email_supplier">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kontak Supplier</label>
                                    <input type="text" class="form-control" placeholder="kontak" name="kontak_supplier">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Supplier</label>
                                    <input type="text" class="form-control" placeholder="alamat" name="alamat_supplier">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto text-center">
                                <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('mimin/footer_mimin')