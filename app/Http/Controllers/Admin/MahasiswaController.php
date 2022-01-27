<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
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
            $mahasiswa = User::where('roles', 'MAHASISWA')->with('mahasiswa')->latest()->get();
            return DataTables::of($mahasiswa)
                ->addIndexColumn()
                ->addColumn('action', function ($siswa) {
                    $actionBtn = '<a href="' . route('admin.mahasiswa.edit', $siswa->id) . '" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" onClick="Delete(this.id)" id="' . $siswa->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
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
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'data berhasil disimpan');
    }

    public function store(Request $request)
    {
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
}
