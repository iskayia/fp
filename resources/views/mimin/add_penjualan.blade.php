@include('mimin/header_mimin')
@include('mimin/nav_mimin')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Tambah Data Penjualan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('add_penjualan_action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row after-add-more ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Produk</label>
                                        <select class="form-control" name="id_produk[]">
                                            <option selected>Pilih produk</option>
                                            @foreach ($produk as $p)
                                                <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jumlah Produk</label>
                                        <input type="number" class="form-control" placeholder="1"
                                            name="jumlah_penjualan[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Entri</label>
                                    <input class="form-control date-picker" name="tgl_penjualan"
                                        placeholder="Masukkan tanggal entri" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto text-center">
                                <button class="btn btn-success add-more" type="button">
                                    <i class="glyphicon glyphicon-plus"></i> Tambah form baru
                                </button>
                                <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copy invisible">
    <div class="row-new">
        <button type="button" class="remove">
            <i class="nc-icon nc-basket"></i> Delete
        </button>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Produk</label>
                    <select class="form-control" name="id_produk[]">
                        <option selected>Pilih produk</option>
                        @foreach ($produk as $p)
                            <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Jumlah Produk</label>
                    <input type="number" class="form-control" placeholder="1" name="jumlah_penjualan[]">
                </div>
            </div>
        </div>
    </div>
</div>
{{-- js untuk button tambah form agar bisa menambah data secara banyak --}}
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });
       
        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click",".remove",function(){ 
          $(this).parents(".row-new").remove();
      });

    });
</script>
@include('mimin/footer_mimin')
