<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachments;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Penerimaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class FormulirController extends Controller
{
    public function data()
    {
        $penerimaan = Penerimaan::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::where('user_id',Auth::user()->id)->first();
        return view('mahasiswa.data',compact('penerimaan','jurusan','mahasiswa'));
    }

    public function updateData(Request $request)
    {
        dd(request()->all());
        $mahasiswa = Mahasiswa::where('user_id',Auth::user()->id)->first();
        $mahasiswa->update([
            'jurusan_id' => request()->jurusan_id,
            'penerimaan_id' => request()->penerimaan_id,
        ]);

        $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('assets/kartu_keluarga','public');
        $data['nisn'] = $request->file('nisn')->store('assets/nisn','public');
        $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('assets/bukti_pembayaran','public');
        $data['pas_poto'] = $request->file('pas_poto')->store('assets/pas_poto','public');
        $data['rapor'] = $request->file('rapor')->store('assets/rapor','public');
        $data['kip'] = $request->file('kip')->store('assets/kip','public');
        $data['prestasi'] = $request->file('prestasi')->store('assets/prestasi','public');
        $data['sktm'] = $request->file('sktm')->store('assets/sktm','public');
        $data['ktp_ortu'] = $request->file('ktp_ortu')->store('assets/ktp_ortu','public');
        $data['ijazah'] = $request->file('ijazah')->store('assets/ijazah','public');
        $data['skot'] = $request->file('skot')->store('assets/skot','public');
        $data['hafidz'] = $request->file('hafidz')->store('assets/hafidz','public');

        Attachments::updateOrCreate(
            [
                'user_id' => $request->user_id
            ],
            [
                'penerimaan_id' => $request->penerimaan_id,
                'kartu_keluarga' => $data['kartu_keluarga'],
                'nisn' => $data['nisn'],
                'bukti_pembayaran' => $data['bukti_pembayaran'],
                'pas_poto' => $data['pas_poto'],
                'rapor' => $data['rapor'],
                'kip' => $data['kip'],
                'prestasi' => $data['prestasi'],
                'sktm' => $data['sktm'],
                'ktp_ortu' => $data['ktp_ortu'],
                'ijazah' => $data['ijazah'],
                'skot' => $data['skot'],
                'hafidz' => $data['hafidz'],
            ]
        );

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
    public function PrintPdf()
    {
        $user = User::with('mahasiswa','transaksi')->findOrFail(Auth::user()->id);
        // return $user;
        $pdf = PDF::loadview('pdf.cetakKartuPdf',compact('user'));
        return $pdf->stream();
    }
}
