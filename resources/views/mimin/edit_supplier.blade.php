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
                    <form action="{{ route('update_supplier', $supplier->id_supplier) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input type="text" class="form-control" value="{{$supplier->nama_supplier}}" name="nama_supplier">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Supplier</label>
                                    <input type="text" class="form-control" value="{{$supplier->email_supplier}}" name="email_supplier">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kontak Supplier</label>
                                    <input type="text" class="form-control" value="{{$supplier->kontak_supplier}}" name="kontak_supplier">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Supplier</label>
                                    <input type="text" class="form-control" value="{{$supplier->alamat_supplier}}" name="alamat_supplier">
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