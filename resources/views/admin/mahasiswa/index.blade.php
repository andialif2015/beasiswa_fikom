@extends('layouts.admin')
@section('content')
<section class="content-header">
    <h1>
      Dashboard
      <small>Mahasiswa</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
<!-- Main content -->
<section class="content">
    <div class="row">   
        
        
        <div class="col-xs-12">
            
            
            <div class="box">
                <div class="box-header">
              
            <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Mahasiswa
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped mahasiswa-datatable">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Name</th>
                    <th>Briva</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
              </thead>
            
              <tbody>
            </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  
@endsection

@push('addon-script')
<script type="text/javascript">
    $(function () {
      
        let datatable = $('.mahasiswa-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{!! url()->current() !!}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nisn', name: 'nisn'},
              {data: 'name', name: 'name'},
              {data: 'transaksi.briva', name: 'phone'},
              {data: 'mahasiswa.phone', name: 'phone'},
              {data: 'mahasiswa.status', name: 'phone'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true
              },
          ]
      });
      
    });

     //aksi show modal edit
 function Bayar(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MEMBAYAR DATA INI!",
                icon: "info",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "transaction/"+id,
                        data:   {
                            id,
                            "_token": token
                        },
                        type: 'PUT',
                        success: function (response) {
                            if (response) {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIUPDATE!',
                                    icon: 'success',
                                    timer: 3000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                               
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 3000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });

                            }
                            
                        }
                    });

                } else {
                    return true;
                }
            })
        }

      //aksi delete
      function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "mahasiswa/"+id,
                        data:   {
                            id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response) {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 3000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                               
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 3000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });

                            }
                            
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script> 
@endpush