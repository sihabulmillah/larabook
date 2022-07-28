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
                        <a href="{{route('book')}}"><button class="btn btn-primary btn-sm rounded" style="font-size: 1.1em">
                            <i class="fa fa-sign-out"></i> Kembali
                        </button></a> 
                    </div>
                </div>
            </div>
            <h5>Add Data Book</h5>
            <span>Larabook <code>store</code></span>
        </div>
        <div class="card-block">
            <form method="post" action="/book/store" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                <label class="col-form-label">Judul Buku</label>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="judul" placeholder="Masukan Judul Buku" value="{{old('judul')}}"  class="form-control
                        {{$errors->first('judul') ? "is-invalid":""}}">
                    @error("judul")
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
                <label class="col-form-label">Penerbit</label>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="penerbit" placeholder="Masukan Nama Penerbit" value="{{old('penerbit')}}"  class="form-control
                        {{$errors->first('penerbit') ? "is-invalid":""}}">
                        @error("penerbit")
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
                <label class="col-form-label">Penulis</label>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="penulis" placeholder="Masukan Nama Penulis" value="{{old('penulis')}}"  class="form-control
                        {{$errors->first('penulis') ? "is-invalid":""}}">
                        @error("penulis")
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="col">
                <label class="col-form-label">Harga</label>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="number" name="harga" placeholder="Masukan Harga Buku" value="{{old('harga')}}"  class="form-control
                        {{$errors->first('harga') ? "is-invalid":""}}">
                        @error("harga")
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
                    <label class="col-form-label">Upload File</label>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="file" name="image" value="{{old('image')}}"  class="form-control {{$errors->first('image') ? "is-invalid":""}}">
                        @error("image")
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>
            </div>
            <div class="col">
                <label class="col-form-label">Kategori</label>
                <div class="form-group-row">
                <div class="col-md-12">
                    <select name="kategori" class="form-control">
                        <option value="opt1">Select Category</option>
                        @foreach ($data as $item)
                        <option value="{{$item['id']}}">{{$item['kategori']}}</option>
                        @endforeach
                    </select>
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

