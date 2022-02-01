@extends('layouts.mahasiswa')
@section('content')
<section class="content">
     <div class="row">
             
   
       <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Menyatakan dengann sebenar-benarnya bahwa :</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('PrintPDF') }}" >
              @csrf
              <div class="box-body">
              
                <div class="checkbox">
                  <label>
                    <input type="checkbox" required> Data yang diisikan pada formulir pendaftaran adalah benar dan dapat dipertanggungjawabkan
                  </label>
                </div>
                <div class="checkbox">
                    <label>
                      <input type="checkbox" required> Berkas / Dokumen yang saya sertakan dalam pendaftaran PMB STKIP PGRI Pacitan TA
                      2022/2023 adalah benar dan sesuai dengan berkas aslinya.
                    </label>
                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                @if ($attachment)
                <button type="submit" class="btn btn-primary">Submit</button>
                
                @else
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Submit</button>
                @endif
              </div>
            </form>
          </div>
       </div>
           <!-- /.box -->
         <!-- /.col -->
    </div>
     <!-- /.row -->
   </section>
   <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Silahkan Lengkapi Data Terlebih dahulu</h4>
        </div>
        <div class="modal-body">
          <p>Terimaakasih</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection