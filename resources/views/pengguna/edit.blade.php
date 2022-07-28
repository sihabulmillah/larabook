@extends('template')
@section('konten')
<div class="row">
 <div class="col-sm-12">
    <!-- Basic Form Inputs card start -->
    <div class="card">
        <div class="card-header">
            <div style="float: right">
                <div class="row">
                    <div class="col-md-5">
                        <a href=""><button class="btn btn-primary btn-sm rounded" style="font-size: 1.1em">
                            <i class="fa fa-sign-out"></i> Kembali
                        </button></a> 
                    </div>
                </div>
            </div>
            <h5>Edit Data Pengguna</h5>
            <span>Larabook <code>store</code></span>
        </div>
        <div class="card-block">
            <form method="post" action="/pengguna/update-{{$data->id}}">
            @csrf
            <div class="row">
                <div class="col">
                <label class="col-form-label">Nama</label>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="nama" placeholder="Masukan Nama Anda" value="{{$data->nama}}{{old('nama')}}"  class="form-control
                        {{$errors->first('nama') ? "is-invalid":""}}">
                    @error("nama")
                        {{-- <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div> --}}
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                </div>
            </div>
            <div class="col">
                <label class="col-form-label">Username</label>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="username" placeholder="Username" value="{{$data->username}}{{old('username')}}"  class="form-control
                        {{$errors->first('username') ? "is-invalid":""}}">
                        @error("username")
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col">
                <label class="col-form-label">Password</label>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" name="password" placeholder="Masukan Nama password" value="{{$data->password}}{{old('password')}}"  class="form-control
                        {{$errors->first('password') ? "is-invalid":""}}">
                        @error("password")
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="col">
                <label class="col-form-label">Konfirmasi Password</label>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" name="konfirmasi" placeholder="Konfirmasi Password" value="{{old('konfirmasi')}}"  class="form-control
                        {{$errors->first('konfirmasi') ? "is-invalid":""}}">
                        @error("konfirmasi")
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="col-form-label"><small class="text-danger">*</small> Level</label>
                    <div class="form-group row">
                        <div class="col-sm-12">
                           <input type="radio" name="level" value="a" id="a"> <label for="a">Admin</label>
                           <input type="radio" class="ml-2" name="level" value="s" id="s"> <label for="s">Staff</label>
                           <input type="radio" class="ml-2" name="level" value="p" id="p"> <label for="p">Pengguna</label>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
            <button class="btn btn-primary rounded"><i class="fa fa-save"></i>Simpan</button>
        </div>
        </div>
            </form>
    </div>
    <!-- Basic Form Inputs card end -->
 </div>
</div>
@endsection

