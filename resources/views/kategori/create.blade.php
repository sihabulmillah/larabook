@extends('template')

@section('konten')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Data Category</h4>
        <p class="card-description">
          Larabook
        </p>
        <form class="forms-sample" action="/category/store" method="post">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama Kategori</label>
            <input type="text" class="form-control {{$errors->first('kategori') ? "is-invalid":""}}" value="{{old('kategori')}}" name="kategori" id="exampleInputName1" placeholder="Name">
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