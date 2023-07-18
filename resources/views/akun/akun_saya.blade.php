@include('template/header')
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="content container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-body shadow-sm">
                        <div class="author text-center">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ asset('gambar/akun.png') }}" alt="akun saya"
                                    style="height: 200px;">
                                <h5 class="title">{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</h5>
                            </a>
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
                            <a href="{{route('tambah_alamat')}}" class="btn btn-primary">Tambah Alamat</a>
                            <table class="table  text-center">
                                <thead class="text-primary">
                                    <th>No</th>
                                    <th>Alamat</th>
                                </thead>
                                <tbody>
                                  @php
                                      $no = 1;
                                  @endphp
                                  @foreach ($daftar_alamat as $alamat)
                                      <tr>
                                          <td>{{ $no++ }}</td>
                                          <td>{{ $alamat->alamat }}</td>
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
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Company (disabled)</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Company"
                                            value="Creative Code Inc.">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username"
                                            value="michael23">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Company" value="Chet">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name"
                                            value="Faker">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Home Address"
                                            value="Melbourne, Australia">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="City" value="Melbourne">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" placeholder="Country"
                                            value="Australia">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="number" class="form-control" placeholder="ZIP Code">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                                    </div>
                                </div>
                            </div>
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
