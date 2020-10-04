@extends('main')

@section('title')
Data Barang Masuk
@endsection

@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1 class="m-0 text-dark">Data Barang Masuk</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
       <li class="breadcrumb-item active">Data Barang Masuk</li>
     </ol>
   </div><!-- /.col -->
 </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
 <div class="container-fluid">
  <div class="row">
    <div class="col-12">
      @if ($message = Session::get('sukses'))
      <div class="box">
        <h2><i class="fa fa-check"></i>{{ $message }}</h2>
      </div>
      @endif
      <div class="card">
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
        @foreach($ins as $item)
        <tr>
         <td>{{ $loop->iteration }}</td>
         <td>{{ $item->data->nama_barang}}</td>
         <td>{{ $item->tanggal}}</td>
         <td>{{ $item->jumlah}}</td>
         <td>{{ $item->keterangan}}</td>
         <td>
         <form action="{{url('sampah/sampahmasuk/'. $item->id)}}" method="post" class="d-inline" onsubmit="return confirm('yakin kembalikan data?')">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-success">
              <i class="fa fa-history"></i>
            </button>
          </form>
          <form action="{{url('sampah/sampahmasuk/'. $item->id)}}" method="post" class="d-inline" onsubmit="return confirm('yakin hapus data?')">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">
              <i class="fa fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</section>
<!-- Tambah -->



</div>
</div>
@endsection