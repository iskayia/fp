@include('template/header')
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="content container">
        <div class="row">
            <div class="col-md-4">

            </div>
        </div>
        <h1>Tambah Alamat</h1>
        <form action="{{route('save_alamat')}}" method="POST">
            @csrf
            @method('POST')
            <div>
                <label>Provinsi:</label>
                <select id="provinceSelect">
                    <option value="">Pilih Provinsi</option>
                </select>
            </div>

            <div>
                <label>Kota/Kabupaten:</label>
                <select id="citySelect">
                    <option value="">Pilih Kota/Kabupaten</option>
                </select>
            </div>

            <div>
                <label>Kecamatan:</label>
                <select id="districtSelect">
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>

            <div>
                <label>Kelurahan:</label>
                <select id="villageSelect">
                    <option value="">Pilih Kelurahan</option>
                </select>
            </div>
            
            <div>
                <label>Jalan:</label>
                <input type="text" value="" name="jalan">
            </div>

            <div>
                <label>Kode Pos:</label>
                <input type="text" value="" name="kode_pos">
            </div>

            <input type="hidden" name="alamat" id="alamat">

            <button type="submit">Submit</button>
        </form>

    </div>
</section>

@include('template/footer')


<script>
    $(document).ready(function() {
        // Mengambil data provinsi dari API
        $.ajax({
            url: '/api/provinces',
            type: 'GET',
            success: function(response) {
                var options = '<option value="">Pilih Provinsi</option>';

                for (var i = 0; i < response.length; i++) {
                    options += '<option value="' + response[i].id + '">' + response[i].nama + '</option>';
                }

                $('#provinceSelect').html(options);
            }
        });

        // Mengambil data kota/kabupaten berdasarkan provinsi yang dipilih
        $('#provinceSelect').change(function() {
            var provinceId = $(this).val();

            if (provinceId !== '') {
                $.ajax({
                    url: '/api/cities?id_provinsi=' + provinceId,
                    type: 'GET',
                    success: function(response) {
                        var options = '<option value="">Pilih Kota/Kabupaten</option>';

                        for (var i = 0; i < response.length; i++) {
                            options += '<option value="' + response[i].id + '">' + response[i].nama + '</option>';
                        }

                        $('#citySelect').html(options);
                    }
                });
            } else {
                $('#citySelect').html('<option value="">Pilih Kota/Kabupaten</option>');
            }
        });

        // Mengambil data kecamatan berdasarkan kota/kabupaten yang dipilih
        $('#citySelect').change(function() {
            var cityId = $(this).val();

            if (cityId !== '') {
                $.ajax({
                    url: '/api/districts?id_kota=' + cityId,
                    type: 'GET',
                    success: function(response) {
                        var options = '<option value="">Pilih Kecamatan</option>';

                        for (var i = 0; i < response.length; i++) {
                            options += '<option value="' + response[i].id + '">' + response[i].nama + '</option>';
                        }

                        $('#districtSelect').html(options);
                    }
                });
            } else {
                $('#districtSelect').html('<option value="">Pilih Kecamatan</option>');
            }
        });

        // Mengambil data kelurahan berdasarkan kecamatan yang dipilih
        $('#districtSelect').change(function() {
            var districtId = $(this).val();

            if (districtId !== '') {
                $.ajax({
                    url: '/api/villages?id_kecamatan=' + districtId,
                    type: 'GET',
                    success: function(response) {
                        var options = '<option value="">Pilih Kelurahan</option>';

                        for (var i = 0; i < response.length; i++) {
                            options += '<option value="' + response[i].id + '">' + response[i].nama + '</option>';
                        }

                        $('#villageSelect').html(options);
                        var provinsi = $('#provinceSelect option:selected').text();
                        var kota = $('#citySelect option:selected').text();
                        var kecamatan = $('#districtSelect option:selected').text();
                        var kelurahan = $('#villageSelect option:selected').text();
                        $('#alamat').val(kelurahan+", "+kecamatan+", " + kota + ", "+provinsi);
                    }
                });
            } else {
                $('#villageSelect').html('<option value="">Pilih Kelurahan</option>');
            }
        });
    });
</script>
