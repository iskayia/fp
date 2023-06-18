@extends('tampil')
@section('content')

<div class="row d-flex align-items-center justify-content-center h-100">
    <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="{{asset('tempenjualan/assets/img/vector5.png')}}" class="img-fluid" alt="Phone image">
    </div>
    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <!-- email input -->
            <div class="form-outline mb-4">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email_pelanggan" value="{{ old('email_pelanggan') }}" />

            </div>
            <!-- password input -->
            <div class="form-outline mb-4">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <!-- button login -->
            <div class="form-outline mb-4">
                <button class="btn btn-warning">Masuk</button>
                <a class="btn btn-danger" href="{{ route('index') }}">Kembali</a>
            </div>
            <!-- belum ada akun? register disiini -->
            <div class="d-flex justify-content-around align-items-center mb-4">
                <a href="{{ route('register') }}">Belum punya akun? Daftar disini</a>
            </div>
        </form>
    </div>
</div>
@endsection