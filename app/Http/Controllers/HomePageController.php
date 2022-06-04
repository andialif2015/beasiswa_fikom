<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomePageController extends Controller
{
    function index(){
        if (request()->ajax()) {
            $mahasiswa = User::with('transaksi')->where('roles', 'MAHASISWA')->with('mahasiswa')->latest()->get();

            return DataTables::of($mahasiswa)
                ->addIndexColumn()
                ->addColumn('action', function ($siswa) {
                    $actionBtn = '<a href="' . route('admin.mahasiswa.edit', $siswa->id) . '" class="edit btn btn-warning btn-sm">Edit</a>
                    ';
                    // <a href="javascript:void(0)" onClick="Delete(this.id)" id="' . $siswa->id . '" class="delete btn btn-danger btn-sm">Delete</a>

                         if($siswa->transaksi != null){
                             $transaction = '<a href="javascript:void(0)" onClick="Bayar(this.id)" id="' . $siswa->transaksi->id  . '" class="bayar btn btn-info btn-sm">Bayar</a> ';
                         }else{
                             $transaction = '';
                         }


                    $whatsapp =' <a href="https://wa.me/'. $siswa->mahasiswa->phone .'?text=*SELAMAT%20PEMBAYARA%20ANDA%20TELAH%20KAMI%20TERIMA*%20selanjutnya%20silahkan%20anda%20melakukan%20pengisian%20data%20dan%20upload%20berkas%20dengan%20login%20pada%20alamat%20http://pmb.awalcerita.com/login%20dengan%20NISN%20:%20'. $siswa->nisn .'%20dan%20password%20:%20'. $siswa->password_sementara .'" target="_blank" class="btn btn-success btn-sm">Whatsapp</a>';

                    return $siswa->mahasiswa->status == "DALAM PROSES" ?  $actionBtn .  $transaction . $whatsapp:$actionBtn . $whatsapp  ;
                    // return $actionBtn  . $transaction . $whatsapp;
                })
                ->addColumn('briva',function($transaksi){
                     if($transaksi->transaksi != null){
                             return $transaksi->transaksi->briva ;
                         }else{
                             return '';
                         }

                })
                ->rawColumns(['action','briva'])
                ->make(true);
       }
    }
}
