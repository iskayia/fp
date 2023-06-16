@extends('tampil')
@section('content')
<div class="row d-flex align-items-center justify-content-center h-100">
    <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="{{asset('penjualan/assets/img/vector7.png')}}" class="img-fluid" alt="Phone image">
    </div>
    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('register.action') }}" method="POST">
            @csrf
            <div class="form-outline mb-4">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
            </div>
           <div class="form-outline mb-4">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
           <div class="form-outline mb-4">
                <label>Password Confirmation<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirm" />
            </div>
           <div class="form-outline mb-4">
                <label>Position <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="level" value="{{ old('level') }}" />
            </div>
           <div class="form-outline mb-4">
                <button class="btn btn-warning">Daftar</button>
                <a class="btn btn-danger" href="{{ route('index') }}">Kembali</a>
            </div>
            <!-- login kalau sudah ada akun -->
            <div class="d-flex justify-content-around align-items-center mb-4">
                <a href="{{ route('login') }}">Masuk jika sudah memiliki akun</a>
            </div>
        </form>
    </div>
</div>
@endsection