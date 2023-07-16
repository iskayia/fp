@include('template/header')
<section class="page-section " id="services" style="background-color:#FEFCF3; height:100%;">
    <div class="content container">
        
        <h1>Daftar Alamat</h1>
        <a href="{{route('tambah_alamat')}}" class="btn btn-primary">Tambah Alamat</a>
        <div class="row">
            @foreach ($daftar_alamat as $alamat)
            <div >{{$alamat->alamat}}</div>
                
            @endforeach
        </div>
    
    </div>
</section>

@include('template/footer')