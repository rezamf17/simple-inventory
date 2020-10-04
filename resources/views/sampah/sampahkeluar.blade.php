@extends('main')

@section('title')
Edit Data Barang Keluar
@endsection

@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1 class="m-0 text-dark">Edit Data Barang Keluar</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
       <li class="breadcrumb-item active">Edit Data Barang Keluar</li>
     </ol>
   </div><!-- /.col -->
 </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
  <div class="card">
    <div class="card-header">
@if ($message = Session::get('sukses'))
     <div class="box">
      <strong><i class="fa fa-check"></i>{{ $message }}</strong>
    </div>
    @endif
    </div>   
    <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>No</th>
         <th>Nama Barang</th>
         <th>Tanggal</th>
         <th>Jumlah</th>
         <th>Keterangan</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
      @foreach ($outs as $o)
      <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $o->keluar->nama_barang}}</td>
        <td>{{ $o->tanggal}}</td>
        <td>{{ $o->jumlah}}</td>
        <td>{{ $o->keterangan}}</td>
        <td>
          <form action="{{url('sampah/sampahkeluar/'. $o->id)}}" method="post" class="d-inline" onsubmit="return confirm('yakin kembalikan data?')">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-success">
              <i class="fa fa-history"></i>
            </button>
          </form>
          <form action="{{url('sampah/sampahkeluar/'. $o->id)}}" method="post" class="d-inline"  onsubmit="return confirm('yakin hapus data permanen?')">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">
              <i class="fa fa-trash"></i>
            </button>
          </form>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</section>
@endsection