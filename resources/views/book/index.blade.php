@extends('template')

@section('konten')
@if (session('status'))
<div class="alert bg-success alert-dismissible fade show" role="alert">
<strong> {{session('status')}} </strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h4 class="text-bold">List Book's</h4>
        <span>Larabook<code>store</code></span>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                <li><i class="fa fa-window-maximize full-card"></i></li>
                <li><i class="fa fa-minus minimize-card"></i></li>
                <li><i class="fa fa-refresh reload-card"></i></li>
                <li><i class="fa fa-trash close-card"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-block table-border-style">
        <a href="{{route('create-book')}}"><button class="btn btn-success btn-sm mb-3" style="font-size: 12px"><i class="fa fa-plus-circle"></i> Add Data</button></a>
        <a href="{{route('book')}}"><button class="btn btn-success btn-sm mb-3" data-toggle = "tooltip" data-placement = "right" title="Refresh" style="font-size: 12px"><i class="fa fa-refresh"></i></button></a>
        <div style="float: right">
            <form action="{{route('book')}}" method="get">
        <div class="row">
            <div class="col-md-9 pr-0">
                <div class="form-group">
                    <input type="text" name="judul" placeholder="Cari berdasarkan judul ..." class="form-control">
                </div>
            </div>
            <div class="col-md-3 pl-1">
                <button class="btn btn-success btn-sm rounded">
                    <i class="fa fa-search" style="font-size: 1em"></i>
                </button>
            </div>
        </div>
    </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    
            <tr>
                    <td scope="row">{{ ++$no }}</td>
                    <td>{{ $item['judul'] }}</td>
                    <td>{{ $item['penulis'] }}</td>
                    <td>@php
                        $harga = $item['harga'];
                        $rupiah = number_format($harga,'2','.',',');
                        echo "Rp $rupiah";
                        @endphp
                        </td>
                    <td><img src="upload/{{ $item['image'] }}" width="50" alt=""></td>
                    <td>
                    <a href="{{route('show',$item['id'])}}"><button class="btn btn-primary btn-sm m-auto" style="font-size: 15px"><i class="fa fa-info-circle"></i></button></a> 
                    <a href="{{route('edit-book',$item['id'])}}"><button class="btn btn-warning text-dark btn-sm" style="font-size: 15px"><i class="fa fa-pencil"></i></button></a>
                    <a href="{{route('delete-book',$item['id'])}}"><button class="btn btn-danger btn-sm" style="font-size: 15px"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Jumlah Data : {{$jumlah}}</td>
                        <td colspan="2" align="right">
                            {{$data->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    </div>
    </div>
@endsection