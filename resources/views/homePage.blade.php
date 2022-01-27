<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <h4 class="text-center my-4">Pendaftaran Mahasiswa Baru</h4>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body text-center">
                        <h1>INI VIDEO</h1>
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>