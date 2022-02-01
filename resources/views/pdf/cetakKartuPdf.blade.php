<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Cetak Kartu Pendaftaran!</title>
  </head>
  <body>
    <h5 class="text-center"> KARTU PENDAFTARAN MAHASISWA BARU <br> STKIP PGRI PACITAN <br> TAHUN 2022 </h5>
    <table class="table table-borderless">
        <thead>
          <tr>
            <th width="35%">NO PENDAFTARAN</th>
            <th  width="5%">:</th>
            <th>{{ $user->transaksi->no_transaksi }}</th>
            <th><img src="{{ public_path('storage/'.Auth::user()->photo) }}" class="w-10" style="height: 100px;width:100px !important;border-raidus:10px;" alt=""></th>
          </tr>
          <tr>
            <th width="35%">Nama</th>
            <th  width="5%">:</th>
            <th>{{ Auth::user()->name ?? "-" }}</th>
            <th></th>
          </tr>
          <tr>
            <th width="35%">NISN</th>
            <th  width="5%">:</th>
            <th>{{ Auth::user()->nisn ?? "-" }}</th>
            <th></th>
          </tr>
          <tr>
            <th width="35%">NIK</th>
            <th  width="5%">:</th>
            <th>{{ Auth::user()->biodata->nik ?? "-" }}</th>
            <th></th>
          </tr>
          <tr>
            <th width="35%">TEMPAT DAN TGL LAHIR</th>
            <th  width="5%">:</th>
            <th>{{ $user->mahasiswa->tempat_lahir ?? "-" }}</th>
            <th></th>
          </tr>
          <tr>
            <th width="35%">ASAL SEKOLAH</th>
            <th  width="5%">:</th>
            <th>{{ Auth::user()->lulusan->asal_sekolah ?? "-" }}</th>
            <th></th>
          </tr>
          <tr>
            <th width="35%">JURUSAN YANG DIPILIH</th>
            <th  width="5%">:</th>
            <th>{{ Auth::user()->mahasiswa->jurusan->name ?? "-" }}</th>
            <th>Tanda Tangan</th>
          </tr>
          <tr>
            <th width="35%"></th>
            <th  width="5%"></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th width="35%"></th>
            <th  width="5%"></th>
            <th></th>
            <th>{{ $user->name }}</th>
          </tr>
        </thead>
        
      </table>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>