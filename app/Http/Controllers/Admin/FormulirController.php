<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormulirController extends Controller
{
    public function data()
    {
        $penerimaan = Penerimaan::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::where('user_id',Auth::user()->id)->first();
        return view('mahasiswa.data',compact('penerimaan','jurusan','mahasiswa'));
    }

    public function updateData()
    {
        $mahasiswa = Mahasiswa::where('user_id',Auth::user()->id)->first();

        $mahasiswa->update([
            'jurusan_id' => request()->jurusan_id,
            'penerimaan_id' => request()->penerimaan_id,
        ]);

        return back()->with('success','berhasil disimpan');
    }

    public function biodata()
    {
        return view('mahasiswa.biodata');
    }

    public function uploads()
    {
        return view('mahasiswa.uploads');

    }

    public function cetakPdf(){
        return view('mahasiswa.cetakKartu');

    }
}
