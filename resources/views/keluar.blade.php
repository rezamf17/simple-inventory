@extends('main')

@section('title')
Data Barang Keluar
@endsection

@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1 class="m-0 text-dark">Data Barang Keluar</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
       <li class="breadcrumb-item active">Data Barang Keluar</li>
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
      <h2><strong><i class="fa fa-check"></i>{{ $message }}</strong></h2>
    </div>
    @endif
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
      <i class="fa fa-plus"></i>
      Tambah Data Barang Keluar
    </button>
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
      @foreach ($outs as $o)
      <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $o->keluar->nama_barang}}</td>
        <td>{{ $o->tanggal}}</td>
        <td>{{ $o->jumlah}}</td>
        <td>{{ $o->keterangan}}</td>
        <td>
          <a href="{{url('keluar/edit/'.$o->id)}}" title="" class="btn btn-success"> <i class="fa fa-edit"></i></a>
          <form action="{{url('keluar', $o->id)}}" method="post" class="d-inline" onsubmit="return confirm('yakin hapus data?')">
            @method('patch')
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
</div>
</div>
</section>
<!-- Tambah -->
<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Barang Keluar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{url('keluar')}}" method="POST">
        @csrf
        <div class="form-group">
          <label>Nama Barang</label>
          <select name="id_keluar" class="form-control">
            <option value="">-- Pilih Barang Keluar --</option>
            @foreach ($items as $i)
            <option value="{{$i->id}}">{{$i->nama_barang}}</option>}
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Jumlah</label>
          <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" placeholder="Jumlah">
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <textarea name="keterangan" placeholder="Keterangan" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Simpan" name="">
      </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Barang Keluar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
      </div>
      <div class="form-group">
        <label>Jumlah</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Jumlah">
      </div>
      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" id="exampleInputEmail1">
      </div>
      <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" placeholder="Keterangan" class="form-control"></textarea>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <a href="" title="" class="btn btn-primary">Simpan</a>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
@endsection