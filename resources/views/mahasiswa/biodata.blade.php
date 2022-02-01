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
                
                                <form action="{{ route('mahasiswa.create.biodata') }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                      <div class="form-group @error('nik') has-error @enderror">
                                        <label for="exampleInputEmail1">NIK</label>
                                        <input type="number" required class="form-control " value="{{ old('nik') ?? $biodata == null ? '' : $biodata->nik  }}"  name="nik" placeholder="Masukan NIK">
                                        @error('nik')
                                        <span class="help-block">{{ $message }}</span>
                                      @enderror
                                      </div>
                                      <div class="form-group @error('name') has-error @enderror">
                                        <label for="exampleInputEmail1">Nama Lengkap (Sesuai KTP)</label>
                                        <input type="text" class="form-control" required name="name" value="{{ old('name') ?? $biodata == null ? '' : $biodata->name }}"  placeholder="Masukan Nama lengkap">
                                        @error('name')
                                        <span class="help-block">{{ $message }}</span>
                                          @enderror
                                      </div>
                                      {{-- <div class="form-group @error('pas_photo') has-error @enderror">
                                        <label for="exampleInputPassword1">Upload Photo 3x 4</label>
                                        <input type="file" class="form-control " required name="pas_photo" value="{{ old('pas_photo') }}"  >
                                        @error('pas_photo')
                                        <span class="help-block">{{ $message }}</span>
                                          @enderror
              
                                      </div> --}}
                                      <div class="form-group @error('jenis_kelamin') has-error @enderror">
                                      <label for="exampleInputPassword1">Jenis Kelamin </label>
                                      <select class="form-control" name="jenis_kelamin">
                                        <option value="Perempuan">Perempuan</option> 
                                        <option value="Laki-Laki">Laki-Laki</option> 
                                      </select>
                                      {{-- <input type="date" class="form-control " name="jenis_kelamin"  value="{{ old('jenis_kelamin') }}" placeholder="Masukan Tempat lahir"> --}}
                                      @error('jenis_kelamin')
                                      <span class="help-block">{{ $message }}</span>
                                      @enderror
              
                                    </div>
                                    <div class="form-group @error('tempat_lahir') has-error @enderror ">
                                      <label for="exampleInputPassword1">Tempat Lahir</label>
                                      <input type="text" class="form-control" required name="tempat_lahir" value="{{ old('tempat_lahir') ?? $biodata == null ? '' : $biodata->tempat_lahir }}" placeholder="Masukan Tempat lahir">
                                      @error('tempat_lahir')
                                      <span class="help-block">{{ $message }}</span>
                                      
                                      @enderror
                                    </div>
                                    <div class="form-group @error('tanggal_lahir') has-error @enderror ">
                                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                                      <input type="date" class="form-control " name="tanggal_lahir" required value="{{ old('tanggal_lahir') ?? $biodata == null ? '' : $biodata->tanggal_lahir }}" placeholder="Masukan Tanggal lahir">
                                      @error('tanggal_lahir')
                                      <span class="help-block">{{ $message }}</span>
                                      
                                      @enderror
                                    </div>
                                    <div class="form-group @error('agama') has-error @enderror ">
                                      <label for="exampleInputPassword1">Agama</label>
                                      <input type="text" class="form-control" required name="agama" value="{{ old('agama') ?? $biodata == null ? '' : $biodata->agama }}" placeholder="Masukan Agama">
                                      @error('agama')
                                      <span class="help-block">{{ $message }}</span>
                                      
                                      @enderror
                                    </div>
                                    <div class="form-group @error('anak') has-error @enderror ">
                                      <label for="exampleInputPassword1">Anak</label>
                                      <input type="number" class="form-control" required name="anak" value="{{ old('anak') ?? $biodata == null ? '' : $biodata->anak }}" placeholder="Masukan Anak Ke berapa">
                                      @error('anak')
                                      <span class="help-block">{{ $message }}</span>
                                      
                                      @enderror
                                    </div>
                                    <div class="form-group @error('jumlah_saudara') has-error @enderror ">
                                      <label for="exampleInputPassword1">Jumlah Saudara </label>
                                      <input type="number" class="form-control" required name="jumlah_saudara" value="{{ old('jumlah_saudara') ?? $biodata == null ? '' : $biodata->jumlah_saudara }}" placeholder="Masukan Jumlah Saudara">
                                      @error('jumlah_saudara')
                                      <span class="help-block">{{ $message }}</span>
                                      
                                      @enderror
                                    </div>
                                    <div class="form-group @error('status_sipil') has-error @enderror ">
                                      <label for="exampleInputPassword1">Status Sipil  </label>
                                      <input type="text" class="form-control" required name="status_sipil" value="{{ old('status_sipil') ?? $biodata == null ? '' : $biodata->status_sipil}}" placeholder="Masukan Status Sipil">
                                      @error('status_sipil')
                                      <span class="help-block">{{ $message }}</span>
                                      
                                      @enderror
                                    </div>
                                    <div class="form-group @error('phone') has-error @enderror ">
                                      <label for="exampleInputPassword1">Nomor Hp  </label>
                                      <input type="number" class="form-control " required name="phone" value="{{ old('phone') ?? $biodata == null ? '' : $biodata->phone }}" placeholder="Masukan Nomor Handphone">
                                      @error('phone')
                                      <span class="help-block">{{ $message }}</span>
                                      
                                      @enderror
                                    </div>
                                    <div class="form-group @error('email') has-error @enderror ">
                                      <label for="exampleInputPassword1">Email   </label>
                                      <input type="email" class="form-control " required name="email" value="{{ old('email') ?? $biodata == null ? '' : $biodata->email }}" placeholder="Masukan E-Mail">
                                      @error('email')
                                      <span class="help-block">{{ $message }}</span>
                                      
                                      @enderror
                                    </div>
                                    
                                    <div class="form-group @error('pemberi_rekomendasi') has-error @enderror ">
                                      <label for="exampleInputPassword1">Pemberi Rekomendasi   </label>
                                      @if($biodata)
                                      <select name="pemberi_rekomendasi" class="form-control">
                                        <option value="DOSEN" {{ $biodata->pemberi_rekomendasi  == "DOSEN" ? "selected" : "" }}>DOSEN</option>
                                        <option value="MAHASISWA" {{  $biodata->pemberi_rekomendasi  == "MAHASISWA" ? "selected" : "" }} >MAHASISWA</option>
                                        <option value="KARYAWAN" {{  $biodata->pemberi_rekomendasi  == "KARYAWAN" ? "selected" : "" }} >KARYAWAN</option>
                                        <option value="ALUMNI" {{  $biodata->pemberi_rekomendasi  == "ALUMNI" ? "selected" : "" }} >ALUMNI</option>
                                      </select>
                                      @else
                                        <select name="pemberi_rekomendasi" class="form-control">
                                        <option value="DOSEN">DOSEN</option>
                                        <option value="MAHASISWA" >MAHASISWA</option>
                                        <option value="KARYAWAN">KARYAWAN</option>
                                        <option value="ALUMNI" >ALUMNI</option>
                                      </select>
                                      @endif
                                      @error('pemberi_rekomendasi')
                                      <span class="help-block">{{ $message }}</span>
                                      @enderror
                                    </div>

                                      <div class="form-group @error('nama_rekomendasi') has-error @enderror ">
                                        <label for="exampleInputPassword1">Nama Rekomendasi</label>
                                        <input class="form-control" required name="nama_rekomendasi" value="{{ old('email') ?? $biodata == null ? '' : $biodata->nama_rekomendasi }}" type="text">
                                          @error('nama_rekomendasi')
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
              
                                <form action="{{ route('mahasiswa.create.biodata') }}" method="post">
                                 @csrf
                                    <div class="form-group @error('RT') has-error @enderror">
                                      <label for="exampleInputEmail1">RT</label>
                                      <input type="number" class="form-control " value="{{ old('RT') ?? $alamat == null ? '' : $alamat->RT }}"  name="RT" placeholder="Masukan RT">
                                      @error('RT')
                                      <span class="help-block">{{ $message }}</span>
                                     @enderror
                                    </div>
                                    <div class="form-group @error('RW') has-error @enderror">
                                       <label for="exampleInputEmail1">RW </label>
                                       <input type="text" required class="form-control" name="RW" value="{{ old('RW') ?? $alamat == null ? '' : $alamat->RW }}"  placeholder="Masukan RW">
                                       @error('RW')
                                       <span class="help-block">{{ $message }}</span>
                                         @enderror
                                     </div>
                                    <div class="form-group @error('dusun') has-error @enderror">
                                      <label for="exampleInputPassword1">DUSUN </label>
                                      <input type="text" required class="form-control " name="dusun" value="{{ old('dusun') ?? $alamat == null ? '' :$alamat->dusun }}"  placeholder="Masukan Dusun">
                                      @error('dusun')
                                      <span class="help-block">{{ $message }}</span>
                                         @enderror
             
                                    </div>
                                    <div class="form-group @error('desa') has-error @enderror">
                                     <label for="exampleInputPassword1">DESA </label>
                                     <input type="text" required class="form-control " name="desa"  value="{{ old('desa') ?? $alamat == null ? '' : $alamat->desa }}" placeholder="Masukan Desa">
                                     @error('desa')
                                     <span class="help-block">{{ $message }}</span>
                                     @enderror
             
                                   </div>
                                   <div class="form-group @error('kecamatan') has-error @enderror ">
                                     <label for="exampleInputPassword1">KECAMATAN</label>
                                     <input type="text" required class="form-control " name="kecamatan" value="{{ old('kecamatan') ?? $alamat == null ? '' : $alamat->kecamatan }}" placeholder="Masukan Kecamatan">
                                     @error('kecamatan')
                                     <span class="help-block">{{ $message }}</span>
                                     
                                     @enderror
                                   </div>
                                   <div class="form-group @error('kabupaten') has-error @enderror ">
                                    <label for="exampleInputPassword1">KABUPATEN</label>
                                    <input type="text" required class="form-control " name="kabupaten" value="{{ old('kabupaten') ?? $alamat == null ? '' : $alamat->kabupaten}}" placeholder="Masukan Kabupaten">
                                    @error('kabupaten')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('Provinsi') has-error @enderror ">
                                    <label for="exampleInputPassword1">PROVINSI</label>
                                    <input type="text" required class="form-control " name="provinsi" value="{{ old('Provinsi') ?? $alamat == null ? '' : $alamat->provinsi }}" placeholder="Masukan Provinsi">
                                    @error('Provinsi')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                  <div class="form-group @error('jalan') has-error @enderror ">
                                    <label for="exampleInputPassword1">NAMA JALAN (Jika ada) </label>
                                    <input type="text" required class="form-control " name="jalan" value="{{ old('jalan') ?? $alamat == null ? '' : $alamat->jalan }}" placeholder="Masukan Nama Jalan">
                                    @error('jalan')
                                    <span class="help-block">{{ $message }}</span>
                                    
                                    @enderror
                                  </div>
                                    <button type="submit" class="btn btn-primary">Daftar Mahasiswa</button>
                                  </form>
                             
                         </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_3">
                            <form action="{{ route('mahasiswa.create.biodata') }}" method="post">
                                @csrf
                                   <div class="form-group @error('nisn') has-error @enderror">
                                     <label for="exampleInputEmail1">NISN</label>
                                     <input type="number" required class="form-control " value="{{ old('nisn') ?? $lulusan == null ? '' : $lulusan->nisn }}"  name="nisn" placeholder="Masukan Nisn">
                                     @error('nisn')
                                     <span class="help-block">{{ $message }}</span>
                                    @enderror
                                   </div>
                                   <div class="form-group @error('name') has-error @enderror">
                                      <label for="exampleInputEmail1">TAHUN LULUS </label>
                                      <input type="number" required class="form-control" name="tahun_lulus" value="{{ old('tahun_lulus') ?? $lulusan == null ? '' : $lulusan->tahun_lulus }}"  placeholder="Masukan Tahun Lulus">
                                      @error('tahun_lulus')
                                      <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   <div class="form-group @error('asal_sekolah') has-error @enderror">
                                     <label for="exampleInputPassword1">ASAL SEKOLAH </label>
                                     <input type="text" required class="form-control " name="asal_sekolah" value="{{ old('asal_sekolah') ?? $lulusan == null ? '' : $lulusan->asal_sekolah}}"  placeholder="Masukan Asal Sekolah">
                                     @error('asal_sekolah')
                                     <span class="help-block">{{ $message }}</span>
                                        @enderror
            
                                   </div>
                                   <div class="form-group @error('npsn') has-error @enderror">
                                    <label for="exampleInputPassword1">NPSN </label>
                                    <input type="number" required class="form-control " name="npsn"  value="{{ old('npsn') ?? $lulusan == null ? '' : $lulusan->npsn}}" placeholder="Masukan NPSN">
                                    @error('npsn')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
            
                                  </div>
                                 
                                   <button type="submit" class="btn btn-primary">Daftar Mahasiswa</button>
                                 </form>
                          </div>
                          <div class="tab-pane" id="tab_4">
                            <form action="{{ route('mahasiswa.create.biodata') }}" method="post">
                                @csrf
                                   <div class="form-group @error('rencana') has-error @enderror">
                                     <label for="exampleInputEmail1">RENCANA TINGGAL </label>
                                     <input type="text" required class="form-control " value="{{ old('rencana') ?? $rencana == null ? '' : $rencana->rencana_tinggal}}"  name="rencana_tinggal" placeholder="Masukan Rencana Tinggal">
                                     @error('rencana')
                                     <span class="help-block">{{ $message }}</span>
                                    @enderror
                                   </div>
                                   <div class="form-group @error('transport') has-error @enderror">
                                      <label for="exampleInputEmail1">ALAT TRANSPORTASI  </label>
                                      <input type="text" required class="form-control" name="transport" value="{{ old('transport') ?? $rencana == null ? '' : $rencana->transport }}"  placeholder="Masukan Transport">
                                      @error('transport')
                                      <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   <div class="form-group @error('jarak_tempuh') has-error @enderror">
                                     <label for="exampleInputPassword1">JARAK TEMPUH  </label>
                                     <input type="text" required class="form-control " name="jarak_tempuh" value="{{ old('jarak_tempuh') ?? $rencana == null ? '' : $rencana->jarak_tempuh }}"  placeholder="Masukan Jarak Tempuh">
                                     @error('jarak_tempuh')
                                     <span class="help-block">{{ $message }}</span>
                                        @enderror
            
                                   </div>
                                   <div class="form-group @error('asal_pembiayaan') has-error @enderror">
                                    <label for="exampleInputPassword1">ASAL PEMBIAYAAN </label>
                                    <input type="text" required class="form-control " name="asal_pembiayaan"  value="{{ old('asal_pembiayaan') ?? $rencana == null ? '' : $rencana->asal_pembiayaan }}" placeholder="Masukan Asal Pembiayaan">
                                    @error('asal_pembiayaan')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
            
                                  </div>
                                 
                                   <button type="submit" class="btn btn-primary">Daftar Mahasiswa</button>
                                 </form>
                          </div>
                          <div class="tab-pane" id="tab_5">
                            <form action="{{ route('mahasiswa.create.biodata') }}" method="post">
                                @csrf
                                   <div class="form-group @error('noKK') has-error @enderror">
                                     <label for="exampleInputEmail1">NO KK  </label>
                                     <input type="number" required class="form-control " value="{{ old('noKK') ?? $pemilikkartu == null ? '' : $pemilikkartu->noKK }}"  name="noKK" placeholder="Masukan Nomor KK">
                                     @error('noKK')
                                     <span class="help-block">{{ $message }}</span>
                                    @enderror
                                   </div>
                                   <div class="form-group @error('nama_kk') has-error @enderror">
                                      <label for="exampleInputEmail1">NAMA KEPALA KELUARGA  </label>
                                      <input type="text" required class="form-control" name="nama_kk" value="{{ old('nama_kk') ?? $pemilikkartu == null ? '' : $pemilikkartu->nama_kk }}"  placeholder="Masukan Nama Kepala Keluarga">
                                      @error('nama_kk')
                                      <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   <div class="form-group @error('kip') has-error @enderror">
                                     <label for="exampleInputPassword1">KIP (Jika ada)   </label>
                                     <input type="text" class="form-control " name="kip" value="{{ old('kip')?? $pemilikkartu == null ? '' : $pemilikkartu->kip }}"  placeholder="Masukan KIP">
                                     @error('kip')
                                     <span class="help-block">{{ $message }}</span>
                                        @enderror
            
                                   </div>
                                   <div class="form-group @error('kks') has-error @enderror">
                                    <label for="exampleInputPassword1">KKS (Jika ada) </label>
                                    <input type="text" class="form-control " name="kks"  value="{{ old('kks') ?? $pemilikkartu == null ? '' : $pemilikkartu->kks }}" placeholder="Masukan KKS">
                                    @error('kks')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
            
                                  </div>
                                  <div class="form-group @error('pkh') has-error @enderror">
                                    <label for="exampleInputPassword1">PKH (Jika ada) </label>
                                    <input type="text" class="form-control " name="pkh"  value="{{ old('pkh') ?? $pemilikkartu == null ? '' : $pemilikkartu->pkh}}" placeholder="Masukan PKH">
                                    @error('pkh')
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