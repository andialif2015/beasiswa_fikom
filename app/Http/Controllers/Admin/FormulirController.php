<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachments;
use App\Models\Biodata;
use App\Models\Alamat;
use App\Models\Lulusan;
use App\Models\PemilikKartu;
use App\Models\Rencana;
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

    public function updateData()
    {
        $mahasiswa = Mahasiswa::where('user_id',Auth::user()->id)->first();

        // $mahasiswa->update([
        //     'jurusan_id' => request()->jurusan_id,
        //     'penerimaan_id' => request()->penerimaan_id,
        // ]);

        $data = request()->all();
        dd($data);

        // $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('assets/attachment','public');
        // $data['nisn'] = $request->file('nisn')->store('assets/store','public');
        // $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('assets/store','public');
        // $data['pas_poto'] = $request->file('pas_poto')->store('assets/store','public');
        // $data['rapor'] = $request->file('rapor')->store('assets/store','public');
        // $data['kip'] = $request->file('kip')->store('assets/store','public');
        // $data['prestasi'] = $request->file('prestasi')->store('assets/store','public');
        // $data['sktm'] = $request->file('sktm')->store('assets/store','public');
        // $data['ktp_ortu'] = $request->file('ktp_ortu')->store('assets/store','public');
        // $data['ijazah'] = $request->file('ijazah')->store('assets/store','public');
        // $data['skot'] = $request->file('skot')->store('assets/store','public');
        // $data['hafidz'] = $request->file('hafidz')->store('assets/store','public');

        // Attachments::updateOrCreate(
        //     [
        //         'user_id' => $request->user_id
        //     ],
        //     [
        //         'penerimaan_id' => $request->penerimaan_id,
        //         'kartu_keluarga' => $data['kartu_keluarga'],
        //         'nisn' => $data['nisn'],
        //         'bukti_pembayaran' => $data['bukti_pembayaran'],
        //         'pas_poto' => $data['pas_poto'],
        //         'rapor' => $data['rapor'],
        //         'kip' => $data['kip'],
        //         'prestasi' => $data['prestasi'],
        //         'sktm' => $data['sktm'],
        //         'ktp_ortu' => $data['ktp_ortu'],
        //         'ijazah' => $data['ijazah'],
        //         'skot' => $data['skot'],
        //         'hafidz' => $data['hafidz'],
        //     ]
        // );

        return back()->with('success','berhasil disimpan');
    }

    public function biodata()
    {
        $biodata = Biodata::where('user_id', Auth::user()->id)->first();
        $alamat = Alamat::where('user_id', Auth::user()->id)->first();
        $lulusan = Lulusan::where('user_id', Auth::user()->id)->first();
        $rencana = Rencana::where('user_id', Auth::user()->id)->first();
        $pemilikkartu = PemilikKartu::where('user_id', Auth::user()->id)->first();
        return view('mahasiswa.biodata',compact('biodata','alamat','lulusan','rencana','pemilikkartu'));
    }
    public function biostore(Request $request)
    {
        $data = $request->all();
        $data['user_id'] =  Auth::user()->id;

        if ($request->nik != null) {
            $data['pas_photo'] = $request->file('pas_photo')->store('assets/attachment','public');
            Biodata::updateOrCreate(
                [
                    'user_id' => $data['user_id']
                ],$data
            );
        }elseif ($request->RT != null) {
            Alamat::updateOrCreate(
                [
                    'user_id' => $data['user_id']
                ],$data
            );
        }elseif ($request->nisn != null) {
            Lulusan::updateOrCreate(
                [
                    'user_id' => $data['user_id']
                ],$data
            );
        }elseif ($request->rencana_tinggal != null) {
           Rencana::updateOrCreate(
                [
                    'user_id' => $data['user_id']
                ],$data
            ); 
        }elseif ($request->no_kk != null) {
            if($request->kip != null){
                $data['kip'] = $request->file('kip')->store('assets/attachment','public');
            }
            if ($request->kks != null) {
                $data['kks'] = $request->file('kks')->store('assets/attachment','public');
            }
            if ($request->pkh != null) {
                $data['pkh'] = $request->file('pkh')->store('assets/attachment','public');
            }
            PemilikKartu::updateOrCreate(
                [
                    'user_id' => $data['user_id']
                ],$data
            );
        }else{
            return false;
        }

        return redirect()->route('biodata.index')->with('success', 'data berhasil disimpan');
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
