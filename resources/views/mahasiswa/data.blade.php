@extends('layouts.mahasiswa')
@section('content')
<section class="content">
    <div class="container">
     <div class="row">
         <div class="col-xs-12">
             
   
           <div class="box container">
             
             <!-- /.box-header -->
             <div class="box-body">
               
                    <form action="{{ route('mahasiswa.update.data') }}" method="post">
                     @csrf
                        <div class="form-group @error('jurusan_id') has-error @enderror">
                          <label for="exampleInputEmail1">Jurusan /Peminatan</label>
                          <select required name="jurusan_id" class="form-control" id="">
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
                            <select required name="penerimaan_id" class="form-control" id="">
                                <option value="">Pilih Jalur Penerimaan</option>
                                @foreach ($penerimaan as $item)
                                <option value="{{ $item->id }}"  {{ $mahasiswa->penerimaan_id === $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('penerimaan_id')
                            <span class="help-block">{{ $message }}</span>
                           @enderror
                          </div>
                        <button type="submit"  {{ $mahasiswa->jurusan_id != null ? "disabled" : "" }}  class="btn btn-primary">Simpan</button>
                      </form>
                 
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