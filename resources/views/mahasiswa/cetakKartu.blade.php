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
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
       </div>
           <!-- /.box -->
         <!-- /.col -->
    </div>
     <!-- /.row -->
   </section>
@endsection