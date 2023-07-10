@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h3 class="description">Pelanggan</h3>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pelanggan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Email</th>
                                <th>Kontak</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php 
                                $n = 1;
                                @endphp
                                @foreach($pelanggan as $p)
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td>{{$p->nama_pelanggan}}</td>
                                    <td>{{$p->email_pelanggan}}</td>
                                    <td>{{$p->kontak_pelanggan}}</td>
                                    <td>
                                        @foreach ($p->alamat as $alamat )
                                            <div>{{$alamat->alamat}}</div>
                                        @endforeach
                                    </td>
                                    <td> 
                                        <a class="dropdown-item" href="{{route('edit_pelanggan',$p->id_pelanggan)}}"><i class="nc-icon nc-settings"></i> Edit</a>
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
</div>


@include('mimin/footer_mimin')