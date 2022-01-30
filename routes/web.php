<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormulirController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\PenerimnaanController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\VideoController;
use App\Models\Transaction;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $transaction= Transaction::first();
    // return view('pageSuccess',compact('transaction'));
    $video = Video::latest()->first();
    return view('homePage',compact('video'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('mahasiswa', MahasiswaController::class, ['as' => 'admin']);
        Route::resource('jurusan', JurusanController::class, ['as' => 'admin']);
        Route::resource('penerimaan', PenerimnaanController::class, ['as' => 'admin']);
        Route::resource('video', VideoController::class, ['as' => 'admin']);
        Route::resource('transaction', TransactionController::class, ['as' => 'admin']);
        Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
        Route::put('profile/{id}', [DashboardController::class, 'profileUpdate'])->name('profile.update');
    });
    Route::prefix('mahasiswa')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [MahasiswaController::class, 'dashboard'])->name('dashboard.mahasiswa');
        Route::get('/data',[FormulirController::class,'data']);
        Route::post('/data',[FormulirController::class,'updateData'])->name('mahasiswa.update.data');
        Route::get('/biodata',[FormulirController::class,'biodata'])->name('biodata.index');
        Route::post('/biodata',[FormulirController::class,'biostore'])->name('mahasiswa.create.biodata');
        Route::get('/uploads',[FormulirController::class,'uploads']);
        Route::get('/cetak',[FormulirController::class,'cetakPdf']);
        Route::get('/profile',[FormulirController::class,'Profile'])->name('profile.mahasiswa');
        Route::PUT('/profile-update/{id}',[FormulirController::class,'UpdateProfile'])->name('update.profile.mahasiswa');
        Route::POST('/cetakPDF',[FormulirController::class,'PrintPdf'])->name('PrintPDF');
       
    });
    Route::post('/register-mahasiswa', [MahasiswaController::class, 'RegisterMahasiwa'])->name('register.mahasiswa');

Auth::routes(['register' => false]);
