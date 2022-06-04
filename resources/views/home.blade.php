@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mr-0" href="#">
                <img src="https://i.postimg.cc/qqWtmxTW/Logo-Fikom-Fulll-Hitam.png" alt="logo-umi" width="50%" >
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login">login</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
    <div class="container">
        <div class="row">
            @if (session('error'))
            <div class="alert alert-danger">
            {{ session('error') }}

            </div>
            @endif
            <h4 class="text-center my-4">Pendaftaran Mahasiswa Baru</h4>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body text-center embed-responsive embed-responsive-16by9">
                      {{-- <iframe width="560" height="315" src="{{ $video->name }}?autoplay=1" title="YouTube video player" frameborder="0"  allowfullscreen></iframe> --}}
                      @if ($video)
                      <iframe width="560" height="345" src="{{ $video->name  }}?autoplay=1&mute=1" class="embed-responsive-item" allowfullscreen>
                      </iframe>
                      @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3>Pendaftaran Mahasiswa baru</h3>
                        <form action="{{ route("register.mahasiswa") }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NISN </label>
                                <input type="number" class="form-control  @error('nisn') is-invalid @enderror " value="{{ old('nisn') }}"  name="nisn" placeholder="Masukan Nisn">
                                @error('nisn')
                                <span class="help-block text-danger">{{ $message }}</span>
                               @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NAMA LENGKAP</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" name="name" placeholder="Masukan Nama">
                                @error('name')
                                <span class="help-block text-danger">{{ $message }}</span>
                               @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"> TEMPAT LAHIR </label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"  value="{{ old('tempat_lahir') }}" name="tempat_lahir" placeholder="Masukan tempat lahir">
                                @error('tempat_lahir')
                                <span class="help-block text-danger">{{ $message }}</span>
                               @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">TGL LAHIR </label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"  value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" >
                                @error('tanggal_lahir')
                                <span class="help-block text-danger">{{ $message }}</span>
                               @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NO HANDPHONE </label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" name="phone" placeholder="Masukan No Handphone">
                                @error('phone')
                                <span class="help-block text-danger">{{ $message }}</span>
                               @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">EMAIL </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" placeholder="Masukan Email">
                                @error('email')
                                <span class="help-block text-danger">{{ $message }}</span>
                               @enderror
                              </div>
                              <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Daftar</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
