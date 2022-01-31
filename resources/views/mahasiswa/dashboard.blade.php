@extends('layouts.mahasiswa')
@section('content')
<section class="content-header">
    <h1>
      Dashboard
      <small>Mahasiswa</small>
    </h1>
   
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
     <div class="col-md-10">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>Hi {{ Auth::user()->name }}!</h5>
            Status pemabayaran kamu saat ini <button type="button" class="btn  btn-warning">{{ Auth::user()->mahasiswa->status }}</button>
          </div>
     </div>
      <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body text-center">
                    <h5>Foto Siswa</h5>
                    <img src="{{ Storage::url( Auth::user()->photo) }}" class="w-100" alt="">
                    <br>
           <button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#modal-default">Change Foto</button>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <b><h5>Rincian Data Pendaftar</h5></b>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Nama Pendaftar</h5>
                            <h5>Tempat Lahir</h5>
                            <h5>Tanggal Lahir</h5>
                            <h5>Nisn</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h5>{{ Auth::user()->mahasiswa->tempat_lahir }}</h5>
                            <h5>{{ Auth::user()->mahasiswa->tanggal_lahir }}</h5>
                            <h5>{{ Auth::user()->nisn }}</h5>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
  
    <!-- /.row (main row) -->

  </section>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Photo Profile</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('changePhoto') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="photo">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left"> Kirim</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection