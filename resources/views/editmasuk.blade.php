@extends('main')

@section('title')
Edit Data Barang Masuk
@endsection

@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1 class="m-0 text-dark">Edit Data Barang Masuk</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
       <li class="breadcrumb-item active">Edit Data Barang Masuk</li>
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
    <a href="{{url('masuk')}}" class="btn btn-default" title=""><i class="fa fa-undo btn-sm"></i>Back</a>
  </div>
  </div>
    
  <div class="card-body">
    <form action="{{url('masuk/edit/'.$ins->id)}}" method="post">
      @csrf
      @method('patch')
         <div class="form-group">
          <label>Nama Barang</label>
          <select name="id_masuk" class="form-control">
            <option value="">-- Pilih Barang --</option>
            @foreach ($items as $itemss)
            <option value="{{$itemss->id}}" {{old('id', $ins->id_masuk) == $itemss->id ?'selected' : null}}>{{$itemss->nama_barang}}</option>}
            @endforeach
          </select>
        </div>
  <div class="form-group">
    <label>Jumlah</label>
    <input type="text" name="jumlah" class="form-control" value="{{old('jumlah', $ins->jumlah)}}" placeholder="Jumlah">
  </div>
  <div class="form-group">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" value="{{old('date', $ins->tanggal)}}">
  </div>
  <div class="form-group">
    <label>Keterangan</label>
    <textarea name="keterangan" placeholder="Keterangan" class="form-control">{{old('keterangan', $ins->keterangan)}}</textarea>
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