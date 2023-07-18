@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Data Pelanggan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_pelanggan',$pelanggan->id_pelanggan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" class="form-control" value="{{$pelanggan->nama_pelanggan}}" name="nama_pelanggan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Pelanggan</label>
                                    <input type="text" class="form-control" value="{{$pelanggan->email_pelanggan}}" name="email_pelanggan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kontak Pelanggan</label>
                                    <input type="text" class="form-control" value="{{$pelanggan->kontak_pelanggan}}" name="kontak_pelanggan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Pelanggan</label>
                                    @foreach ($pelanggan->alamat as $alamat )
                                    <div>{{$alamat->alamat}}</div>
                                @endforeach
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