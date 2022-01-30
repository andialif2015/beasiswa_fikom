@extends('layouts.mahasiswa')
@section('content')
<section class="content">
    <div class="container">
     <div class="row">
         <div class="col-xs-12">
             
   
           <div class="box container">
             
             <!-- /.box-header -->
             <div class="box-body">
               
                <div class="row">
                    <div class="col-md-8">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">BIODATA</a></li>
                          <li><a href="#tab_2" data-toggle="tab">ALAMAT (Sesuai KTP)
                        </a></li>
                          <li><a href="#tab_3" data-toggle="tab">SEKOLAH / LULUSAN</a></li>
                          <li><a href="#tab_4" data-toggle="tab">RENCANA</a></li>
                          <li><a href="#tab_5" data-toggle="tab">KEPEMILIKAN KARTU
                        </a></li>
                         
                          <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="box-body">
              
                                <form action="{{ route('admin.mahasiswa.store') }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                    <div class="form-group @error('nisn') has-error @enderror">
                                      <label for="exampleInputEmail1">NIK</label>
                                      <input type="number" class="form-control " value="{{ old('nisn') }}"  name="nisn" placeholder="Masukan Nisn">
                                      @error('nisn')
                                      <span class="help-block">{{ $message }}</span>
                                     @enderror
                                    </div>
                                    <div class="form-group @error('name') has-error @enderror">
                                       <label for="exampleInputEmail1">Nama Lengkap (Sesuai KTP)</label>
                                       <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Masukan Nama lengkap">
                                       @error('name')
                                       <span class="help-block">{{ $message }}</span>
                                         @enderror
                                     </div>
                                    <div class="form-group @error('tempat_lahir') has-error @enderror">
                                      <label for="exampleInputPassword1">Upload Photo 3x 4</label>
                                      <input type="file" class="form-control " name="tempat_lahir" value="{{ old('tempat_lahir') }}"  placeholder="Masukan Tempat lahir">
                                      @error('tempat_lahir')
                                      <span class="help-block">{{ $message }}</span>
                                         @enderror
             
                                    </div>
                                    <div class="form-group @error('tanggal_lahir') has-error @enderror">
                                     <label for="exampleInputPassword1">Jenis Kelamin </label>
                                     <input type="date" class="form-control " name="tanggal_lahir"  value="{{ old('tanggal_lahir') }}" placeholder="Masukan Tempat lahir">
                                     @error('tanggal_lahir')
                                     <span class="help-block">{{ $message }}</span>
                                     @enderror
             
                                   </div>
                                   <div class="form-group @error('phone') has-error @enderror ">
                                     <label for="exampleInputPassword1">Tempat Lahir</label>
                                     <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                     @error('phone')
                                     <span class="help-block">{{ $message }}</span>
                                     
                                     @enderror
                                   </div>
                                   <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">Tanggal Lahir</label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">Agama</label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">Anak</label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">Jumlah Saudara </label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">Status Sipil  </label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">Nomor Hp  </label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">Email   </label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">Rekomendasi   </label>
                                    <select name="rekomendasi" class="form-control">
                                      <option value="DOSEN">DOSEN</option>
                                      <option value="MAHASISWA">MAHASISWA</option>
                                      <option value="KARYAWAN">KARYAWAN</option>
                                      <option value="ALUMNI">ALUMNI</option>
                                    </select>
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                    <button type="submit" class="btn btn-primary">Daftar Mahasiswa</button>
                                  </form>
                             
                         </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="box-body">
              
                                <form action="{{ route('admin.mahasiswa.store') }}" method="post">
                                 @csrf
                                    <div class="form-group @error('nisn') has-error @enderror">
                                      <label for="exampleInputEmail1">RT</label>
                                      <input type="number" class="form-control " value="{{ old('nisn') }}"  name="nisn" placeholder="Masukan Nisn">
                                      @error('nisn')
                                      <span class="help-block">{{ $message }}</span>
                                     @enderror
                                    </div>
                                    <div class="form-group @error('name') has-error @enderror">
                                       <label for="exampleInputEmail1">RW </label>
                                       <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Masukan Nama lengkap">
                                       @error('name')
                                       <span class="help-block">{{ $message }}</span>
                                         @enderror
                                     </div>
                                    <div class="form-group @error('tempat_lahir') has-error @enderror">
                                      <label for="exampleInputPassword1">DUSUN </label>
                                      <input type="text" class="form-control " name="tempat_lahir" value="{{ old('tempat_lahir') }}"  placeholder="Masukan Tempat lahir">
                                      @error('tempat_lahir')
                                      <span class="help-block">{{ $message }}</span>
                                         @enderror
             
                                    </div>
                                    <div class="form-group @error('tanggal_lahir') has-error @enderror">
                                     <label for="exampleInputPassword1">DESA </label>
                                     <input type="date" class="form-control " name="tanggal_lahir"  value="{{ old('tanggal_lahir') }}" placeholder="Masukan Tempat lahir">
                                     @error('tanggal_lahir')
                                     <span class="help-block">{{ $message }}</span>
                                     @enderror
             
                                   </div>
                                   <div class="form-group @error('phone') has-error @enderror ">
                                     <label for="exampleInputPassword1">KECAMATAN</label>
                                     <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                     @error('phone')
                                     <span class="help-block">{{ $message }}</span>
                                     
                                     @enderror
                                   </div>
                                   <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">KABUPATEN</label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">PROVINSI</label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('phone') has-error @enderror ">
                                    <label for="exampleInputPassword1">NAMA JALAN (Jika ada) </label>
                                    <input type="number" class="form-control " name="phone" value="{{ old('phone') }}" placeholder="Masukan Tempat lahir">
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                    <button type="submit" class="btn btn-primary">Daftar Mahasiswa</button>
                                  </form>
                             
                         </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_3">
                            <form action="{{ route('admin.mahasiswa.store') }}" method="post">
                                @csrf
                                   <div class="form-group @error('nisn') has-error @enderror">
                                     <label for="exampleInputEmail1">NISN</label>
                                     <input type="number" class="form-control " value="{{ old('nisn') }}"  name="nisn" placeholder="Masukan Nisn">
                                     @error('nisn')
                                     <span class="help-block">{{ $message }}</span>
                                    @enderror
                                   </div>
                                   <div class="form-group @error('name') has-error @enderror">
                                      <label for="exampleInputEmail1">TAHUN LULUS </label>
                                      <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Masukan Nama lengkap">
                                      @error('name')
                                      <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   <div class="form-group @error('tempat_lahir') has-error @enderror">
                                     <label for="exampleInputPassword1">ASAL SEKOLAH </label>
                                     <input type="text" class="form-control " name="tempat_lahir" value="{{ old('tempat_lahir') }}"  placeholder="Masukan Tempat lahir">
                                     @error('tempat_lahir')
                                     <span class="help-block">{{ $message }}</span>
                                        @enderror
            
                                   </div>
                                   <div class="form-group @error('tanggal_lahir') has-error @enderror">
                                    <label for="exampleInputPassword1">NPSN </label>
                                    <input type="date" class="form-control " name="tanggal_lahir"  value="{{ old('tanggal_lahir') }}" placeholder="Masukan Tempat lahir">
                                    @error('tanggal_lahir')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
            
                                  </div>
                                 
                                   <button type="submit" class="btn btn-primary">Daftar Mahasiswa</button>
                                 </form>
                          </div>
                          <div class="tab-pane" id="tab_4">
                            <form action="{{ route('admin.mahasiswa.store') }}" method="post">
                                @csrf
                                   <div class="form-group @error('nisn') has-error @enderror">
                                     <label for="exampleInputEmail1">RENCANA TINGGAL </label>
                                     <input type="number" class="form-control " value="{{ old('nisn') }}"  name="nisn" placeholder="Masukan Nisn">
                                     @error('nisn')
                                     <span class="help-block">{{ $message }}</span>
                                    @enderror
                                   </div>
                                   <div class="form-group @error('name') has-error @enderror">
                                      <label for="exampleInputEmail1">ALAT TRANSPORTASI  </label>
                                      <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Masukan Nama lengkap">
                                      @error('name')
                                      <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   <div class="form-group @error('tempat_lahir') has-error @enderror">
                                     <label for="exampleInputPassword1">JARAK TEMPUH  </label>
                                     <input type="text" class="form-control " name="tempat_lahir" value="{{ old('tempat_lahir') }}"  placeholder="Masukan Tempat lahir">
                                     @error('tempat_lahir')
                                     <span class="help-block">{{ $message }}</span>
                                        @enderror
            
                                   </div>
                                   <div class="form-group @error('tanggal_lahir') has-error @enderror">
                                    <label for="exampleInputPassword1">ASAL PEMBIAYAAN </label>
                                    <input type="date" class="form-control " name="tanggal_lahir"  value="{{ old('tanggal_lahir') }}" placeholder="Masukan Tempat lahir">
                                    @error('tanggal_lahir')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
            
                                  </div>
                                 
                                   <button type="submit" class="btn btn-primary">Daftar Mahasiswa</button>
                                 </form>
                          </div>
                          <div class="tab-pane" id="tab_5">
                            <form action="{{ route('admin.mahasiswa.store') }}" method="post">
                                @csrf
                                   <div class="form-group @error('nisn') has-error @enderror">
                                     <label for="exampleInputEmail1">NO KK  </label>
                                     <input type="number" class="form-control " value="{{ old('nisn') }}"  name="nisn" placeholder="Masukan Nisn">
                                     @error('nisn')
                                     <span class="help-block">{{ $message }}</span>
                                    @enderror
                                   </div>
                                   <div class="form-group @error('name') has-error @enderror">
                                      <label for="exampleInputEmail1">NAMA KEPALA KELUARGA  </label>
                                      <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Masukan Nama lengkap">
                                      @error('name')
                                      <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   <div class="form-group @error('tempat_lahir') has-error @enderror">
                                     <label for="exampleInputPassword1">KIP (Jika ada)   </label>
                                     <input type="text" class="form-control " name="tempat_lahir" value="{{ old('tempat_lahir') }}"  placeholder="Masukan Tempat lahir">
                                     @error('tempat_lahir')
                                     <span class="help-block">{{ $message }}</span>
                                        @enderror
            
                                   </div>
                                   <div class="form-group @error('tanggal_lahir') has-error @enderror">
                                    <label for="exampleInputPassword1">KKS (Jika ada) </label>
                                    <input type="date" class="form-control " name="tanggal_lahir"  value="{{ old('tanggal_lahir') }}" placeholder="Masukan Tempat lahir">
                                    @error('tanggal_lahir')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
            
                                  </div>
                                  <div class="form-group @error('tanggal_lahir') has-error @enderror">
                                    <label for="exampleInputPassword1">PKH (Jika ada) </label>
                                    <input type="date" class="form-control " name="tanggal_lahir"  value="{{ old('tanggal_lahir') }}" placeholder="Masukan Tempat lahir">
                                    @error('tanggal_lahir')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
            
                                  </div>
                                 
                                   <button type="submit" class="btn btn-primary">Daftar Mahasiswa</button>
                                 </form>
                          </div>
                          <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                      </div>
                      <!-- nav-tabs-custom -->
                    </div>
                
                    <!-- /.col -->
                  </div>
                    
                 
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>
         <!-- /.col -->
       </div>
    </div>
     <!-- /.row -->
   </section>
@endsection