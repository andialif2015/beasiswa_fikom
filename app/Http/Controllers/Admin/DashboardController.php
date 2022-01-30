<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = User::where('roles','MAHASISWA')->count();
        $bayar = User::whereHas('transaksi',function($q){
            $q->where('status','success');
        })->count();
        $berkas = User::whereHas('mahasiswa',function($q){
            $q->where('status','BERKAS LENGKAP');
        })->count();
        $diterima = User::whereHas('mahasiswa',function($q){
            $q->where('status','BERKAS DITERIIMA');
        })->count();
        return view('admin.dashboard',compact('mahasiswa','bayar','berkas','diterima'));
    }

    public function profile()
    {
        $profile = Auth::user();
        return view('admin.profile',compact('profile'));

    }

    public function profileUpdate(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'confirmed'
        ]);
        if ($request->input('password') == "") {
            $user->update([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
            ]);
        } else {
           
            $user->update([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'password'  => bcrypt($request->input('password')),

            ]);
        }
        return redirect()->route('dashboard')->with('success','data berhasil disimpan');
      
    }
}
