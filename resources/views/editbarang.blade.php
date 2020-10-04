@extends('main')

@section('title')
Edit Data Barang
@endsection

@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1 class="m-0 text-dark">Edit Data Barang</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
       <li class="breadcrumb-item active">Edit Data Barang</li>
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
    <div class="float-right">
    <a href="{{url('barang')}}" class="btn btn-default" title=""><i class="fa fa-undo btn-sm"></i>Back</a>
  </div>
  </div>
    
  <div class="card-body">
    <form action="{{url('barang/edit/'.$items->id)}}" method="post">
      @csrf
      @method('patch')
         <div class="form-group">
          <label>Nama Barang</label>
         <input type="text" name="nama_barang" class="form-control @error('name')  is-invalid @enderror"placeholder="Nama Barang" value="{{old('nama_barang', $items->nama_barang)}}">
          @error('nama_barang')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
  <div class="form-group">
    <label>Jumlah</label>
    <input type="text" name="jumlah" class="form-control" value="{{old('jumlah', $items->jumlah)}}" placeholder="Jumlah">
  </div>
</div>
<div class="modal-footer justify-content-between">
  <input type="submit" class="btn btn-primary" value="Simpan" name="">
</div>
</form> 
  </div>
  </div>
 </section>
@endsection