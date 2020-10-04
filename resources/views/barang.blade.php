@extends('main')

@section('title')
Data Barang
@endsection

@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1 class="m-0 text-dark">Data Barang</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
       <li class="breadcrumb-item active">Data Barang</li>
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
      <strong><i class="fa fa-check"></i>{{ $message }}</strong>
    </div>
    @endif
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
      <i class="fa fa-plus"></i> Tambah Data Barang
    </button>
    <div class="card">
      <table id="example1" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>No</th>
         <th>Nama Barang</th>
         <th>Jumlah</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
      @foreach($items as $item)
      <tr>
       <td>{{ $loop->iteration }}</td>
       <td>{{ $item->nama_barang }}</td>
       <td>{{ $item->jumlah }}</td>
       <th>
        <a href="{{url('barang/edit/'.$item->id)}}" title="" class="btn btn-success"> <i class="fa fa-edit"></i></a>
        <form action="{{url('barang', $item->id)}}" method="post" class="d-inline" onsubmit="return confirm('yaqueen hapus data?')">
          @method('patch')
          @csrf
          <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash"></i>
          </button>
        </form>

      </th>
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
        <h4 class="modal-title">Tambah Data Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('barang')}}" method="POST">

         <div class="form-group">
          @csrf
          <label>Nama Barang</label>
          <input type="text" name="nama_barang" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nama Barang">
          @error('nama_barang')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" name="jumlah" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Jumlah">
          @error('jumlah')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Simpan" name="">
        <!-- <a href="" title="" class="btn btn-primary">Simpan</a> -->
      </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
@endsection