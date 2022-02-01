@extends('layouts.mahasiswa')
@section('content')
<section class="content">
    <div class="container">
     <div class="row">
         <div class="col-xs-12">
             
   
           <div class="box container">
             
             <!-- /.box-header -->
             <div class="box-body">
             @if ($attachment)
            
             <div class="row">
             <div class="text-center">
               <h2>Data Berhasil Di input</h2>
             </div>
               <div class="col-lg-4 ml-auto">
                 <h5>Jurusan</h5>
                 <h5>Jalur Penerimaan</h5>
               </div>
               <div class="col-lg-4 mr-auto">
                 <h5>: {{ $mahasiswa->jurusan->name ?? ' ' }} </h5>
                 <h5>: {{ $attachment->penerimaan->name ?? ' ' }} </h5>
               </div>
               </div>
               <div class="row" style="display: none">
                 <h4>Attachment</h4>
                 <form action="{{ route('mahasiswa.update.data', $attachment->id) }}" method="post" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')
                   <div class="row">
                       <div class="col-lg-12">
                         <div class="form-group @error('kartu_keluarga') has-error @enderror">
                           <label for="exampleInputEmail1">Kartu Keluarga</label>
                           <input type="file" name="kartu_keluarga" required class="form-control">
                           <input type="hidden" name="jurusan_id" class="form-control jurusan_id">
                           <input type="hidden" name="penerimaan_id" class="form-control penerimaan">
                           @error('kartu_keluarga')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                       <div class="col-lg-12">
                         <div class="form-group @error('nisn') has-error @enderror">
                           <label for="exampleInputEmail1">NISN</label>
                           <input type="file" required name="nisn" class="form-control">
                           @error('nisn')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                       <div class="col-lg-12">
                         <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                           <label for="exampleInputEmail1">Bukti Pembayaran</label>
                           <input type="file" required name="bukti_pembayaran" class="form-control">
                           @error('bukti_pembayaran')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                       <div class="col-lg-12">
                         <div class="form-group @error('pas_poto') has-error @enderror">
                           <label for="exampleInputEmail1">Pas Foto 4x6</label>
                           <input type="file" required name="pas_poto" class="form-control">
                           @error('pas_poto')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                       <div class="col-lg-12">
                         <div class="form-group @error('rapor') has-error @enderror">
                           <label for="exampleInputEmail1">Rapor SMT 1-5</label>
                           <input type="file" required name="rapor" class="form-control">
                           @error('rapor')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                       <div class="col-lg-12">
                         <div class="form-group @error('kip') has-error @enderror">
                           <label for="exampleInputEmail1">KIP/KKS/PKH</label>
                           <input type="file" required name="kip" class="form-control">
                           @error('kip')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                       <div class="col-lg-12">
                         <div class="form-group @error('prestasi') has-error @enderror">
                           <label for="exampleInputEmail1">Bukti Prestasi (Jika Ada)</label>
                           <input type="file" name="prestasi" class="form-control">
                           @error('prestasi')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                       <div class="col-lg-12">
                         <div class="form-group @error('sktm') has-error @enderror">
                           <label for="exampleInputEmail1">SKTM / Surat Keterangan Penghasilan Orang Tua</label>
                           <input type="file" required name="sktm" class="form-control">
                           @error('sktm')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                       <div class="col-lg-12">
                         <div class="form-group @error('ktp_ortu') has-error @enderror">
                           <label for="exampleInputEmail1">KTP Orang Tua & Pendaftaran</label>
                           <input type="file" required name="ktp_ortu" class="form-control">
                           @error('ktp_ortu')
                           <span class="help-block">{{ $message }}</span>
                         @enderror
                         </div>
                       </div>
                     </div>
                     <button type="submit"    class="btn btn-primary" id="simpan">Simpan</button>
                   </form>
             </div>
              @else
                <form action="{{ route('mahasiswa.update.data') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group @error('jurusan_id') has-error @enderror">
                      <label for="exampleInputEmail1">Jurusan /Peminatan</label>
                      <select required name="jurusan_id" class="form-control" id="jurusan_id">
                          <option value="">Pilih Jurusan</option>
                          @foreach ($jurusan as $item)
                          <option value="{{ $item->id }}" {{ $mahasiswa->jurusan_id === $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                          @endforeach
                      </select>
                      @error('jurusan_id')
                      <span class="help-block">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group @error('penerimaan_id') has-error @enderror">
                        <label for="exampleInputEmail1">Jalur Penerimaan</label>
                        <select required name="penerimaan_id" class="form-control" id="penerimaan">
                            <option value="">Pilih Jalur Penerimaan</option>
                            @foreach ($penerimaan as $item)
                            <option value="{{ $item->id }}"  {{ $mahasiswa->penerimaan_id === $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('penerimaan_id')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
                  </div>
                  
                  <input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
                  <button type="submit"   class="btn btn-primary" id="simpan">Simpan</button>
                    
                </form>
             @endif
                    
                 
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
<div class="modal fade" id="modal{{ $penerimaan[0]->id }}" tabindex="-1" role="dialog" aria-labelledby="modalOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h5 class="mt-2">{{ $penerimaan[0]->name }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ route('mahasiswa.update.data') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                  <div class="form-group @error('kartu_keluarga') has-error @enderror">
                    <label for="exampleInputEmail1">Kartu Keluarga</label>
                    <input type="file" name="kartu_keluarga" required class="form-control">
                    <input type="hidden" name="jurusan_id" class="form-control jurusan_id">
                    <input type="hidden" name="penerimaan_id" class="form-control penerimaan">
                    @error('kartu_keluarga')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group @error('nisn') has-error @enderror">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="file" required name="nisn" class="form-control">
                    @error('nisn')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                    <label for="exampleInputEmail1">Bukti Pembayaran</label>
                    <input type="file" required name="bukti_pembayaran" class="form-control">
                    @error('bukti_pembayaran')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group @error('pas_poto') has-error @enderror">
                    <label for="exampleInputEmail1">Pas Foto 4x6</label>
                    <input type="file" required name="pas_poto" class="form-control">
                    @error('pas_poto')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group @error('rapor') has-error @enderror">
                    <label for="exampleInputEmail1">Rapor SMT 1-5</label>
                    <input type="file" required name="rapor" class="form-control">
                    @error('rapor')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group @error('kip') has-error @enderror">
                    <label for="exampleInputEmail1">KIP/KKS/PKH</label>
                    <input type="file" required name="kip" class="form-control">
                    @error('kip')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group @error('prestasi') has-error @enderror">
                    <label for="exampleInputEmail1">Bukti Prestasi (Jika Ada)</label>
                    <input type="file" name="prestasi" class="form-control">
                    @error('prestasi')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group @error('sktm') has-error @enderror">
                    <label for="exampleInputEmail1">SKTM / Surat Keterangan Penghasilan Orang Tua</label>
                    <input type="file" required name="sktm" class="form-control">
                    @error('sktm')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group @error('ktp_ortu') has-error @enderror">
                    <label for="exampleInputEmail1">KTP Orang Tua & Pendaftaran</label>
                    <input type="file" required name="ktp_ortu" class="form-control">
                    @error('ktp_ortu')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
              </div>
              <button type="submit"    class="btn btn-primary" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modal{{ $penerimaan[1]->id }}" tabindex="-1" role="dialog" aria-labelledby="modalOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h5 class="mt-2">{{ $penerimaan[1]->name }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ route('mahasiswa.update.data') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group @error('kartu_keluarga') has-error @enderror">
                      <label for="exampleInputEmail1">Kartu Keluarga</label>
                      <input type="file" required name="kartu_keluarga" class="form-control">
                      <input type="hidden" name="jurusan_id" class="form-control jurusan_id">
                      <input type="hidden" name="penerimaan_id" class="form-control penerimaan">
                      @error('kartu_keluarga')
                      <span class="help-block">{{ $message }}</span>
                    @enderror
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group @error('nisn') has-error @enderror">
                      <label for="exampleInputEmail1">NISN</label>
                      <input type="file" required name="nisn" class="form-control">
                      @error('nisn')
                      <span class="help-block">{{ $message }}</span>
                    @enderror
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                      <label for="exampleInputEmail1">Bukti Pembayaran</label>
                      <input type="file" name="bukti_pembayaran" class="form-control">
                      @error('bukti_pembayaran')
                      <span class="help-block">{{ $message }}</span>
                    @enderror
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group @error('pas_poto') has-error @enderror">
                      <label for="exampleInputEmail1">Pas Foto 4x6</label>
                      <input type="file" required name="pas_poto" class="form-control">
                      @error('pas_poto')
                      <span class="help-block">{{ $message }}</span>
                    @enderror
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group @error('rapor') has-error @enderror">
                      <label for="exampleInputEmail1">Rapor SMT 1-5</label>
                      <input type="file" required name="rapor" class="form-control">
                      @error('rapor')
                      <span class="help-block">{{ $message }}</span>
                    @enderror
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group @error('prestasi') has-error @enderror">
                      <label for="exampleInputEmail1">Bukti Prestasi (Wajib Ada)</label>
                      <input type="file" required name="prestasi" class="form-control">
                      @error('prestasi')
                      <span class="help-block">{{ $message }}</span>
                    @enderror
                    </div>
                  </div>
                </div>
              <button type="submit"   class="btn btn-primary" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal{{ $penerimaan[2]->id }}" tabindex="-1" role="dialog" aria-labelledby="modalOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h5 class="mt-2">{{ $penerimaan[1]->name }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ route('mahasiswa.update.data') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group @error('kartu_keluarga') has-error @enderror">
                    <label for="exampleInputEmail1">Kartu Keluarga</label>
                    <input type="file" required name="kartu_keluarga" class="form-control">
                    <input type="hidden" name="jurusan_id" class="form-control jurusan_id">
                    <input type="hidden" name="penerimaan_id" class="form-control penerimaan">
                    @error('kartu_keluarga')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('nisn') has-error @enderror">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="file" required name="nisn" class="form-control">
                    @error('nisn')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                    <label for="exampleInputEmail1">Bukti Pembayaran</label>
                    <input type="file" required name="bukti_pembayaran" class="form-control">
                    @error('bukti_pembayaran')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                    <label for="exampleInputEmail1">Ijazah/Transkrip/SKL</label>
                    <input type="file" required name="ijazah" class="form-control">
                    @error('bukti_pembayaran')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('pas_poto') has-error @enderror">
                    <label for="exampleInputEmail1">Pas Foto 4x6</label>
                    <input type="file" required name="pas_poto" class="form-control">
                    @error('pas_poto')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('rapor') has-error @enderror">
                    <label for="exampleInputEmail1">Rapor SMT 1-5</label>
                    <input type="file" required name="rapor" class="form-control">
                    @error('rapor')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
              </div>
              <button type="submit"    class="btn btn-primary" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal{{ $penerimaan[3]->id }}" tabindex="-1" role="dialog" aria-labelledby="modalOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h5 class="mt-2">{{ $penerimaan[3]->name }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ route('mahasiswa.update.data') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group @error('kartu_keluarga') has-error @enderror">
                  <label for="exampleInputEmail1">Kartu Keluarga</label>
                  <input type="file" required name="kartu_keluarga" class="form-control">
                  <input type="hidden" name="jurusan_id" class="form-control jurusan_id">
                  <input type="hidden" name="penerimaan_id" class="form-control penerimaan">
                  @error('kartu_keluarga')
                  <span class="help-block">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group @error('nisn') has-error @enderror">
                  <label for="exampleInputEmail1">NISN</label>
                  <input type="file" required name="nisn" class="form-control">
                  @error('nisn')
                  <span class="help-block">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                  <label for="exampleInputEmail1">Bukti Pembayaran</label>
                  <input type="file" required name="bukti_pembayaran" class="form-control">
                  @error('bukti_pembayaran')
                  <span class="help-block">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                  <label for="exampleInputEmail1">Ijazah/Transkrip/SKL</label>
                  <input type="file" required name="ijazah" class="form-control">
                  @error('bukti_pembayaran')
                  <span class="help-block">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group @error('pas_poto') has-error @enderror">
                  <label for="exampleInputEmail1">Pas Foto 4x6</label>
                  <input type="file" required name="pas_poto" class="form-control">
                  @error('pas_poto')
                  <span class="help-block">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group @error('rapor') has-error @enderror">
                  <label for="exampleInputEmail1">Rapor SMT 1-5</label>
                  <input type="file" required name="rapor" class="form-control">
                  @error('rapor')
                  <span class="help-block">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>
              <button type="submit"   class="btn btn-primary" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal{{ $penerimaan[4]->id }}" tabindex="-1" role="dialog" aria-labelledby="modalOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h5 class="mt-2">{{ $penerimaan[4]->name }} </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ route('mahasiswa.update.data') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="{{ $penerimaan[4]->id}}" >
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group @error('kartu_keluarga') has-error @enderror">
                    <label for="exampleInputEmail1">Kartu Keluarga</label>
                    <input type="file" required name="kartu_keluarga" class="form-control">
                    <input type="hidden" name="jurusan_id" class="form-control jurusan_id">
                    <input type="hidden" name="penerimaan_id" class="form-control penerimaan">
                    @error('kartu_keluarga')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('nisn') has-error @enderror">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="file" required name="nisn" class="form-control">
                    @error('nisn')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                    <label for="exampleInputEmail1">Bukti Pembayaran</label>
                    <input type="file" required name="bukti_pembayaran" class="form-control">
                    @error('bukti_pembayaran')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('pas_poto') has-error @enderror">
                    <label for="exampleInputEmail1">Pas Foto 4x6</label>
                    <input type="file" required name="pas_poto" class="form-control">
                    @error('pas_poto')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('rapor') has-error @enderror">
                    <label for="exampleInputEmail1">Rapor SMT 1-5</label>
                    <input type="file" required name="rapor" class="form-control">
                    @error('rapor')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('sktm') has-error @enderror">
                    <label for="exampleInputEmail1">SKTM / Surat Keterangan Penghasilan Orang Tua</label>
                    <input type="file" required name="sktm" class="form-control">
                    @error('sktm')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('prestasi') has-error @enderror">
                    <label for="exampleInputEmail1">Bukti Prestasi (Jika Ada)</label>
                    <input type="file" required name="prestasi" class="form-control">
                    @error('prestasi')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
              </div>
            </div>
              <button type="submit"  class="btn btn-primary" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal{{ $penerimaan[5]->id }}" tabindex="-1" role="dialog" aria-labelledby="modalOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h5 class="mt-2">{{ $penerimaan[5]->name }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ route('mahasiswa.update.data') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group @error('kartu_keluarga') has-error @enderror">
                    <label for="exampleInputEmail1">Kartu Keluarga</label>
                    <input type="file" required name="kartu_keluarga" class="form-control">
                    <input type="hidden" name="jurusan_id" class="form-control jurusan_id">
                    <input type="hidden" name="penerimaan_id" class="form-control penerimaan">
                    @error('kartu_keluarga')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('nisn') has-error @enderror">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="file" required name="nisn" class="form-control">
                    @error('nisn')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                    <label for="exampleInputEmail1">Bukti Pembayaran</label>
                    <input type="file" required name="bukti_pembayaran" class="form-control">
                    @error('bukti_pembayaran')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('pas_poto') has-error @enderror">
                    <label for="exampleInputEmail1">Pas Foto 4x6</label>
                    <input type="file" required name="pas_poto" class="form-control">
                    @error('pas_poto')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                    <label for="exampleInputEmail1">Ijazah/Transkrip/SKL</label>
                    <input type="file" required name="ijazah" class="form-control">
                    @error('bukti_pembayaran')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('skot') has-error @enderror">
                    <label for="exampleInputEmail1">Surat Kematian Orang Tua</label>
                    <input type="file" required name="skot" class="form-control">
                    @error('skot')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
              </div>
              <button type="submit"    class="btn btn-primary" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal{{ $penerimaan[6]->id }}" tabindex="-1" role="dialog" aria-labelledby="modalOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h5 class="mt-2">{{ $penerimaan[6]->name }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ route('mahasiswa.update.data') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group @error('kartu_keluarga') has-error @enderror">
                    <label for="exampleInputEmail1">Kartu Keluarga</label>
                    <input type="file" required name="kartu_keluarga" class="form-control">
                    <input type="hidden" name="jurusan_id" class="form-control jurusan_id">
                    <input type="hidden" name="penerimaan_id" class="form-control penerimaan">
                    @error('kartu_keluarga')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('nisn') has-error @enderror">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="file" required name="nisn" class="form-control">
                    @error('nisn')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                    <label for="exampleInputEmail1">Bukti Pembayaran</label>
                    <input type="file" required name="bukti_pembayaran" class="form-control">
                    @error('bukti_pembayaran')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('pas_poto') has-error @enderror">
                    <label for="exampleInputEmail1">Pas Foto 4x6</label>
                    <input type="file" required name="pas_poto" class="form-control">
                    @error('pas_poto')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                    <label for="exampleInputEmail1">Ijazah/Transkrip/SKL</label>
                    <input type="file" required name="ijazah" class="form-control">
                    @error('bukti_pembayaran')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('sktm') has-error @enderror">
                    <label for="exampleInputEmail1">SKTM / Surat Keterangan Penghasilan Orang Tua</label>
                    <input type="file" required name="sktm" class="form-control">
                    @error('sktm')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group @error('hafidz') has-error @enderror">
                    <label for="exampleInputEmail1">Surat keterangan Hafizh Qur'an</label>
                    <input type="file" required name="hafidz" class="form-control">
                    @error('hafidz')
                    <span class="help-block">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
              </div>
              <button type="submit"   class="btn btn-primary" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@push('addon-script')
<script type="text/javascript">
  $(document).ready(function()
{
  
$("#penerimaan").change(function()
{
  var id=$(this).val();
  console.log(id);
  var dataString = 'id='+ id;
  let jurusan_id = $("#jurusan_id").val();
  let penerimaan_id = $("#penerimaan").val();

  $(".penerimaan").val(penerimaan_id);
  $(".jurusan_id").val(jurusan_id);

  if(id == 1){
    $('#modal{{ $penerimaan[0]->id }}').modal('show');
  }if(id==2){
    $('#modal{{ $penerimaan[1]->id }}').modal('show');
  }if(id==3){
    $('#modal{{ $penerimaan[2]->id }}').modal('show');
  }
  if(id==4){
       $('#modal{{ $penerimaan[3]->id }}').modal('show');
  }
  if(id==5){
       $('#modal{{ $penerimaan[4]->id }}').modal('show');
  }
  if(id==6){
       $('#modal{{ $penerimaan[5]->id }}').modal('show');
  }
  if(id==7){
       $('#modal{{ $penerimaan[6]->id }}').modal('show');
  }
  });

});
</script>
@endpush