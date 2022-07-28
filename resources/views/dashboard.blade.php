{{-- @extends('template') --}}
@extends('template')

@section('konten')

<div class="col-md-12">
    <div class="row">
        <!-- sale card start -->
        <div class="col-md-6">
            <div class="card bg-c-red total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4>{{$data}}</h4>
                        <p class="m-0">Total Buku</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-c-green total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4><i class="fa fa-book"></i> {{$data2}}</h4>
                        <p class="m-0">Total Kategori</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- sale card end -->
    </div>

<!-- Basic table card start -->
<div class="card">
 <div class="card-header">
     <h4 class="text-bold">List User</h4>
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
     <div class="table-responsive">
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Username</th>
                     <th></th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <th scope="row">1</th>
                     <td>Mark</td>
                     <td>Otto</td>
                     <td>@mdo</td>
                     <td>
                      <button class="btn btn-primary btn-sm m-auto" style="font-size: 15px"><i class="fa fa-info-circle"></i></button>
                      <button class="btn btn-warning text-dark btn-sm" style="font-size: 15px"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btn-sm" style="font-size: 15px"><i class="fa fa-trash"></i></button>
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>
 </div>
</div>
</div>
<!-- Basic table card end -->
@endsection