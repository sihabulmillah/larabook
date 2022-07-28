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
        <small>ps == Lalabook123</small>
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
        <a href="{{route('create-pengguna')}}"><button class="btn btn-success btn-sm mb-3" style="font-size: 12px"><i class="fa fa-plus-circle"></i> Add Data</button></a>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th></th>
                    </tr>
                </thead>
               <tbody>
                @php
                $no = 1;    
                @endphp
                @foreach ($pengguna as $item)
                    
            <tr>
                    <td scope="row">{{ $no }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['username'] }}</td>
                    <td>
                        @if ($item['level'] == 'a') 
                        <span class="badge badge-primary">Admin</span>
                        @elseif ($item['level'] == 's')
                        <span class="badge badge-success">Staff</span>
                        @else
                        <span class="badge badge-secondary">Pengguna</span>
                        @endif
                        
                        </td>
                    <td>
                    <a href="{{route('edit-pengguna',$item['id'])}}"><button class="btn btn-warning text-dark btn-sm" style="font-size: 15px"><i class="fa fa-pencil"></i></button></a>
                    <a href="{{route('delete-pengguna',$item['id'])}}"><button class="btn btn-danger btn-sm" style="font-size: 15px"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
                </tbody> 
                {{-- <tfoot>
                    <tr>
                        <td colspan="4">Jumlah Data : {{$jumlah}}</td>
                        <td colspan="2" align="right">
                            {{$data->links()}}
                        </td>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
    </div>
    </div>
    </div>
@endsection