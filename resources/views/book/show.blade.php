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
                        <a href="{{route('book')}}"><button class="btn btn-warning btn-sm text-dark rounded" style="font-size: 1.1em">
                            <i class="fa fa-sign-out"></i> Kembali
                        </button></a> 
                    </div>
                </div>
            </div>
            <h5>Detail Book</h5>
            <span>Larabook <code>store</code></span>
    <div class="row mt-4">
        <div class="col-2">
            <img src="upload/{{$category['image']}}" width="100%" class="mb-2" alt="">
        </div>
        <div class="col-6">
            <h4 class="text-secondary">{{$category['penulis']}}</h4>
            <h2>{{$category['judul']}}</h2>
            <p class="h4">{{$category->category->kategori}}</p>
            <h6>@php
                $harga = $category['harga'];
                $rupiah = number_format($harga,'2',',','.');
                echo "Rp $rupiah";
                @endphp</h6>
            <p>Penerbit : {{$category['penerbit']}}</p>
        </div>
    </div>
</div>
</div>
</div>
</div>



@endsection