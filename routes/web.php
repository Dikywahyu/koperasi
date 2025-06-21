<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\JenisUsahaController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TipeDokumenController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\AnggotaProfileController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ZiscoController;
use App\Http\Controllers\JenisDonasiController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\CabangController;
use App\Models\Menu;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})->middleware(['auth', 'verified'])->name('dashboard');




// Login Google GoogleController
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Login Manual AuthController 
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/menu', function () {
        return view('system.menu', [
            'title' => 'Menu',
            'allMenus' => Menu::orderBy('title')->get(),
            'permissions' => Permission::orderBy('name')->get(),
        ]);
    })->name('menu');
    Route::get('/menus', [MenuController::class, 'index'])->name('menus');
    Route::get('/menus/{id}', [MenuController::class, 'show']);
    Route::post('/menus', [MenuController::class, 'store']);
    Route::put('/menus/{id}', [MenuController::class, 'update']);
    Route::delete('/menus/{id}', [MenuController::class, 'destroy']);

    Route::get('/menuuser', fn() => view('system.menuuser', ['title' => 'Menu User']))->name('menuuser');


    Route::get('/permission', fn() => view('system.permissions', ['title' => 'Permissions']))->name('permission');
    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::post('/permissions', [PermissionController::class, 'store']);
    Route::get('/permissions/{id}', [PermissionController::class, 'show']);
    Route::put('/permissions/{id}', [PermissionController::class, 'update']);
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy']);


    Route::get('/role', function () {
        $permissions = Permission::all();
        return view('system.role', [
            'title' => 'Role',
            'permissions' => $permissions
        ]);
    })->name('role');
    Route::get('/roles', [RoleController::class, 'index']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    Route::put('/roles/{id}', [RoleController::class, 'update']);
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

    Route::get('/log', fn() => view('system.log', ['title' => 'Log Aktivitas']))->name('log');
    Route::get('/login-logs', [LoginLogController::class, 'getLog']);

    Route::get('/user', function () {
        return view('system.user', [
            'title' => 'User',
            'roles' => Role::all()
        ]);
    })->name('user');
    Route::get('/users', [UserController::class, 'getUsers'])->middleware('auth')->name('users');
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);

    // Perusahaan
    Route::get('/perusahaan', function () {
        return view('master.perusahaan', ['title' => 'Perusahaan']);
    })->name('perusahaan');
    Route::get('/perusahaans', [PerusahaanController::class, 'index']);
    Route::post('/perusahaans', [PerusahaanController::class, 'store']);
    Route::get('/perusahaans/{id}', [PerusahaanController::class, 'show']);
    Route::put('/perusahaans/{id}', [PerusahaanController::class, 'update']);
    Route::delete('/perusahaans/{id}', [PerusahaanController::class, 'destroy']);

    // Jenis Usaha
    Route::get('/jenis-usaha', function () {
        return view('master.jenis-usaha', ['title' => 'Jenis Usaha']);
    })->name('jenis-usaha');
    Route::get('/jenis-usahas', [JenisUsahaController::class, 'index']);
    Route::post('/jenis-usahas', [JenisUsahaController::class, 'store']);
    Route::get('/jenis-usahas/{id}', [JenisUsahaController::class, 'show']);
    Route::put('/jenis-usahas/{id}', [JenisUsahaController::class, 'update']);
    Route::delete('/jenis-usahas/{id}', [JenisUsahaController::class, 'destroy']);


    // Tipe Dokumen
    Route::get('/tipe-dokumen', function () {
        return view('master.tipe-dokumen', ['title' => 'Tipe Dokumen']);
    })->name('tipe-dokumen');
    Route::get('/tipe-dokumens', [TipeDokumenController::class, 'index']);
    Route::post('/tipe-dokumens', [TipeDokumenController::class, 'store']);
    Route::get('/tipe-dokumens/{id}', [TipeDokumenController::class, 'show']);
    Route::put('/tipe-dokumens/{id}', [TipeDokumenController::class, 'update']);
    Route::delete('/tipe-dokumens/{id}', [TipeDokumenController::class, 'destroy']);

    // Pelanggan
    Route::get('/pelanggan', function () {
        return view('master.pelanggan', ['title' => 'Pelanggan']);
    })->name('pelanggan');
    Route::get('/pelanggans', [PelangganController::class, 'index']);
    Route::post('/pelanggans', [PelangganController::class, 'store']);
    Route::get('/pelanggans/{id}', [PelangganController::class, 'show']);
    Route::put('/pelanggans/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggans/{id}', [PelangganController::class, 'destroy']);


    // Pemasok
    Route::get('/pemasok', function () {
        return view('master.pemasok', ['title' => 'Pemasok']);
    })->name('pemasok');
    Route::get('/pemasoks', [PemasokController::class, 'index']);
    Route::post('/pemasoks', [PemasokController::class, 'store']);
    Route::get('/pemasoks/{id}', [PemasokController::class, 'show']);
    Route::put('/pemasoks/{id}', [PemasokController::class, 'update']);
    Route::delete('/pemasoks/{id}', [PemasokController::class, 'destroy']);


    // Asset
    Route::get('/dataasset', function () {
        return view('master.assets', ['title' => 'Assets']);
    })->name('dataasset');
    Route::get('/dataassets', [AssetController::class, 'index']);
    Route::post('/dataassets', [AssetController::class, 'store']);
    Route::get('/dataassets/{id}', [AssetController::class, 'show']);
    Route::put('/dataassets/{id}', [AssetController::class, 'update']);
    Route::delete('/dataassets/{id}', [AssetController::class, 'destroy']);

    // anggotaprofiles
    Route::get('/anggotaprofiles', [AnggotaProfileController::class, 'index']);
    Route::get('/anggotaprofiles/{id}', [AnggotaProfileController::class, 'show']);
    Route::post('/anggotaprofiles', [AnggotaProfileController::class, 'store']);
    Route::put('/anggotaprofiles/{id}', [AnggotaProfileController::class, 'update']);
    Route::delete('/anggotaprofiles/{id}', [AnggotaProfileController::class, 'destroy']);

    // simpanans
    Route::get('/simpanans', [SimpananController::class, 'index']);
    Route::get('/simpanans/{id}', [SimpananController::class, 'show']);
    Route::post('/simpanans', [SimpananController::class, 'store']);
    Route::put('/simpanans/{id}', [SimpananController::class, 'update']);
    Route::delete('/simpanans/{id}', [SimpananController::class, 'destroy']);

    // pinjamans
    Route::get('/pinjamans', [PinjamanController::class, 'index']);
    Route::get('/pinjamans/{id}', [PinjamanController::class, 'show']);
    Route::post('/pinjamans', [PinjamanController::class, 'store']);
    Route::put('/pinjamans/{id}', [PinjamanController::class, 'update']);
    Route::delete('/pinjamans/{id}', [PinjamanController::class, 'destroy']);

    //angsurans
    Route::get('/angsurans', [AngsuranController::class, 'index']);
    Route::get('/angsurans/{id}', [AngsuranController::class, 'show']);
    Route::post('/angsurans', [AngsuranController::class, 'store']);
    Route::put('/angsurans/{id}', [AngsuranController::class, 'update']);
    Route::delete('/angsurans/{id}', [AngsuranController::class, 'destroy']);


    Route::get('/transaksi', function () {
        return view('laz.transaksis', ['title' => 'Transaksi']);
    })->name('transaksi');
    Route::apiResource('transaksis', TransaksiController::class);

    Route::get('/zisco', function () {
        return view('laz.ziscos', ['title' => 'Zisco']);
    })->name('zisco');
    Route::apiResource('ziscos', ZiscoController::class);

    Route::get('/jenis-donasi', function () {
        return view('laz.jenis-donasis', ['title' => 'Jenis Donasi']);
    })->name('jenis-donasi');
    Route::apiResource('jenis-donasis', JenisDonasiController::class);
    Route::post('/jenis-donasis/import', [JenisDonasiController::class, 'import']);

    Route::get('/instansi', function () {
        return view('laz.instansis', ['title' => 'Instansi']);
    })->name('instansi');
    Route::apiResource('instansis', InstansiController::class);
    Route::post('/instansis/import', [InstansiController::class, 'import']);


    Route::get('/donatur', function () {
        return view('laz.donaturs', ['title' => 'Donatur']);
    })->name('donatur');
    Route::apiResource('donaturs', DonaturController::class);

    Route::get('/donasi', function () {
        return view('laz.donasis', ['title' => 'Donasi']);
    })->name('donasi');
    Route::apiResource('donasis', DonasiController::class);

    Route::get('/kwitansi', function () {
        return view('laz.kwitansis', ['title' => 'Kwitansi']);
    })->name('kwitansi');
    Route::apiResource('kwitansis', KwitansiController::class);
    Route::get('/kwitansi/proses-donasi', [KwitansiController::class, 'prosesDonasiAktif']);
    Route::get('/kwitansi/cetak/{id}', [KwitansiController::class, 'cetakPdf']);




    Route::get('/regional', function () {
        return view('laz.regional', ['title' => 'Regional']);
    })->name('regional');
    Route::apiResource('regionals', RegionalController::class);
    Route::post('/regionals/import', [RegionalController::class, 'import']);


    Route::get('/cabang', function () {
        return view('laz.cabang', ['title' => 'Cabang']);
    })->name('cabang');
    Route::apiResource('cabangs', CabangController::class);
    Route::post('/cabangs/import', [CabangController::class, 'import']);
});




// require __DIR__ . '/auth.php';
