<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $mahasiswa = User::with('transaksi')->where('roles', 'MAHASISWA')->with('mahasiswa')->latest()->get();
        //    dd($mahasiswa);
            return DataTables::of($mahasiswa)
                ->addIndexColumn()
                ->addColumn('action', function ($siswa) {
                    $actionBtn = '<a href="' . route('admin.mahasiswa.edit', $siswa->id) . '" class="edit btn btn-warning btn-sm">Edit</a> 
                    ';
                    // <a href="javascript:void(0)" onClick="Delete(this.id)" id="' . $siswa->id . '" class="delete btn btn-danger btn-sm">Delete</a>
                    $transaction = '<a href="javascript:void(0)" onClick="Bayar(this.id)" id="' . $siswa->transaksi->id . '" class="bayar btn btn-info btn-sm">Bayar</a> ';
                    $whatsapp =' <a href="https://wa.me/'. $siswa->mahasiswa->phone .'?text=*SELAMAT%20PEMBAYARA%20ANDA%20TELAH%20KAMI%20TERIMA*%20selanjutnya%20silahkan%20anda%20melakukan%20pengisian%20data%20dan%20upload%20berkas%20dengan%20login%20pada%20alamat%20http://beasiswa.izaldev.my.id/login%20dengan%20NISN%20:'. $siswa->nisn .'%20dan%20password%20:'. $siswa->password_sementara .'" target="_blank" class="btn btn-success btn-sm">Whatsapp</a>';

                    return $siswa->mahasiswa->status == "DALAM PROSES" ?  $actionBtn .  $transaction . $whatsapp:$actionBtn . $whatsapp  ;
                    // return $actionBtn  . $transaction . $whatsapp;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.mahasiswa.index');
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function edit($id)
    {
        $mahasiswa = User::with('mahasiswa')->findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $mahasiswa = Mahasiswa::where('user_id', $id)->first();

        $user->update([
            'name' => $request->name,
            'nisn' => $request->nisn,
        ]);

        $mahasiswa->update([
            'phone' => $request->phone,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'data berhasil disimpan');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'name'      => 'required',
            'nisn'      => 'required|unique:users',
            'phone'     => 'required|unique:mahasiswa',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $password = $randomString;
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'nisn' => $request->nisn,
                'roles' => "MAHASISWA",
                'password' => Hash::make($password),
                'password_sementara' => $password,
            ]);

            Mahasiswa::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => "DALAM PROSES"
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
        }

        return redirect()->route('admin.mahasiswa.index')->with('success', 'data berhasil disimpan');
    }

    public function destroy($id)
    {
        $mahasiswa = User::findOrFail($id);
        $mahasiswa->delete();
        Mahasiswa::where('user_id', $id)->delete();

        if ($mahasiswa) {
            return response()->json([
                "status" => "success"
            ]);
        } else {
            return response()->json([
                "status" => "error"
            ]);
        }
    }


    public function dashboard()
    {
        return view('mahasiswa.dashboard');

    }

    public function RegisterMahasiwa(Request $request)
    {

        $this->validate($request, [
            'name'      => 'required',
            'nisn'      => 'required|unique:users',
            'email'      => 'required|email|unique:users',
            'phone'     => 'required|unique:mahasiswa',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);
        $no_transaction = Transaction::latest()->first();

        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $password = $randomString;
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'nisn' => $request->nisn,
                'email' => $request->email,
                'roles' => "MAHASISWA",
                'password' => Hash::make($password),
                'password_sementara' => $password,
            ]);

            Mahasiswa::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => "DALAM PROSES"
            ]);

           $transaction = Transaction::create([
                'user_id' => $user->id,
                'no_transaksi' => $no_transaction != null ? $no_transaction->no_transaksi+1 : 2022001,
                'briva' => $no_transaction != null ? $no_transaction->briva+1 : 9992022001,
                'nominal' => 300000,
                'status' => "pending"
           ]);
            DB::commit();

            return view('pageSuccess',compact('transaction'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }

    }
}
