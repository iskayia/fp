@include('template/header')
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="content container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-body shadow-sm">
                        <div class="author text-center">
                            <img class="avatar border-gray" src="{{ asset('gambar/akun.png') }}" alt="akun saya"
                                style="height: 200px;">
                            <h5 class="title">{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</h5>
                        </div>
                        <p class="description text-center">
                            Email : {{ Auth::guard('pelanggan')->user()->email_pelanggan }}<br>
                            Kontak : {{ Auth::guard('pelanggan')->user()->kontak_pelanggan }}
                        </p>
                    </div>
                </div>
                <div class="card card-user">
                    <div class="card-body shadow-sm">
                        <div class="author">
                            <div class="table-responsive">
                                <a href="{{ route('tambah_alamat') }}" class="btn btn-primary">Tambah Alamat</a>
                                <table class="table  text-center">
                                    <thead class="text-primary">
                                        <th>No</th>
                                        <th>Alamat</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($daftar_alamat as $alamat)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $alamat->alamat }}</td>
                                                <td>

                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('hapus_alamat', $alamat->id_alamat) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
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
            <div class="col-md-8 ">
                <div class="card card-user shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12 px-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Nama"
                                            value="{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 px-1">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email"
                                            value="{{ Auth::guard('pelanggan')->user()->email_pelanggan }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kontak</label>
                                        <input type="text" class="form-control" placeholder="Kontak"
                                            value="{{ Auth::guard('pelanggan')->user()->kontak_pelanggan }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('template/footer')
