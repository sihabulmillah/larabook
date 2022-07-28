@extends('template')

@section('konten')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Kategori</h4>
        <p class="card-description">
          PT Lapakin
        </p>
        <form class="forms-sample" action="/category/update{{$edit->id}}" method="post">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama Kategori</label>
            <input type="text" class="form-control {{$errors->first('kategori') ? "is-invalid":""}}" value="{{$edit->kategori}}{{old('kategori')}}" name="kategori" id="exampleInputName1" placeholder="Name">
            @error("kategori")
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
          <center>
          <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Submit</button>
        </center>
        </form>
      </div>
    </div>
  </div>
@endsection