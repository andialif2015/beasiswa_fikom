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
        $mahasiswa = Mahasiswa::with(['jurusan'])->where('user_id',Auth::user()->id)->first();
        $attachment = Attachments::with(['penerimaan'])->where('user_id',Auth::user()->id)->first();
        return view('mahasiswa.data',compact('penerimaan','jurusan','mahasiswa','attachment'));
    }

    public function updateData(Request $request)
    {
        
        $mahasiswa = Mahasiswa::where('user_id',Auth::user()->id)->first();
        
        $mahasiswa->update([
            'jurusan_id' => request()->jurusan_id,
            'penerimaan_id' => request()->penerimaan_id,
        ]);

        $data = request()->all();
        

       if($request->kartu_keluarga){
            $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('assets/attachment','public');
       }
       if($request->nisn){
            $data['nisn'] = $request->file('nisn')->store('assets/store','public');
       }
       if($request->bukti_pembayaran){
        $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('assets/store','public');

       }
       if($request->ijazah){
        $data['ijazah'] = $request->file('ijazah')->store('assets/store','public');
       }else{
           $data['ijazah'] = null;
       }
       if($request->pas_poto){
           $data['pas_poto'] = $request->file('pas_poto')->store('assets/store','public');

       }
       if($request->rapor){

           $data['rapor'] = $request->file('rapor')->store('assets/store','public');
       }else{
           $data['rapor'] = null;
       }
       if($request->kip){

           $data['kip'] = $request->file('kip')->store('assets/store','public');
       }else{
           $data['kip'] = null;
       }
       if($request->prestasi){
           $data['prestasi'] = $request->file('prestasi')->store('assets/store','public');

       }else{
           $data['prestasi'] = null;
       }
       if($request->sktm){
           $data['sktm'] = $request->file('sktm')->store('assets/store','public');
       }else{
           $data['sktm'] = null;
       }
       if($request->ktp_ortu){

           $data['ktp_ortu'] = $request->file('ktp_ortu')->store('assets/store','public');
       }else{
           $data['ktp_ortu'] = null;
       }
       if($request->skot){
           $data['skot'] = $request->file('skot')->store('assets/store','public');

       }else{
           $data['skot'] = null;
       }
       if($request->hafidz){
           $data['hafidz'] = $request->file('hafidz')->store('assets/store','public');
       }else{
           $data['hafidz'] = null;
       }

        Attachments::updateOrCreate(
            [
                'user_id' => Auth::user()->id
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
        }elseif ($request->noKK != null) {
            $data['noKK'] = $request->input('noKK');
            $data['nama_kk'] = $request->input('nama_kk');
            if($request->kip != null){
                $data['kip'] = $request->input('kip');
            }
            if ($request->kks != null) {
                $data['kks'] = $request->input('kks');
            }
            if ($request->pkh != null) {
                $data['pkh'] = $request->input('pkh');
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
        $attachment = Attachments::with(['penerimaan'])->where('user_id',Auth::user()->id)->first();

        return view('mahasiswa.cetakKartu',compact('attachment'));

    }
    public function PrintPdf()
    {
        $user = User::with('mahasiswa','transaksi')->findOrFail(Auth::user()->id);
        // return $user;
        $pdf = PDF::loadview('pdf.cetakKartuPdf',compact('user'));
        return $pdf->stream();
    }

    public function Profile()
    {
        $profile = Auth::user();
        return view('mahasiswa.profile',compact('profile'));
    }

    public function UpdateProfile(Request $request,$id)
    {
        $user = User::findOrFail($id);
        // return $request->all();
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'confirmed'
        ]);

        $mahasiswa = Mahasiswa::where('user_id', $id)->first();
        if ($request->input('password') == "") {
            $user->update([
                'name' => $request->name,
                'nisn' => $request->nisn,
                'email' => $request->email,
            ]);
        } else {
           
            $user->update([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'nisn' => $request->nisn,
                'password'  => bcrypt($request->input('password')),
                'password_sementara'  => $request->input('password')
            ]);
        }
        

        $mahasiswa->update([
            'phone' => $request->phone,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status' => $user->mahasiswa->status,
        ]);

        return redirect()->route('dashboard.mahasiswa')->with('success','data berhasil disimpan');
    }
}
