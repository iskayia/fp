@include('mimin/header_mimin')
@include('mimin/nav_mimin')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h4>Laporan Pembelian</h4>
            <div class="card">
                <div class="card-header">
                    Pilih rentang waktu
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label>Tanggal Entri</label>
                                <input class="form-control date-picker" name="daterange"
                                    placeholder="Masukkan rentang waktu entri" type="text">
                            </div>
                        </div>
                        <div class="col-sm-2 update ml-auto mr-auto text-center">
                            <button type="submit" class="btn btn-primary btn-round"
                                onclick="myFunction()">Tampilkan</button>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Pembelian </th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Harga Pembelian</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>jasuke</td>
                                        <td>2</td>
                                        <td>2 mei</td>
                                        <td>50000 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- tabel akan muncul jika button tampil di klik --}}
    </div>
</div>

<script>
    function myFunction() {
        document.getElementById("demo").innerHTML = "Hello World";
    }
</script>

@include('mimin/footer_laporan')
