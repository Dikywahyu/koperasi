<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SetorSimpananController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MenuController;
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

    // SIMPANAN
    Route::get('setor-simpanan', fn() => view('simpanpinjam.setor-simpanan'))->name('setor.simpanan');
    Route::get('/simpan-pinjam/setor-simpanan', [SetorSimpananController::class, 'index'])->name('setor.simpanan');
    Route::post('/simpan-pinjam/setor-simpanan', [SetorSimpananController::class, 'store'])->name('setor.simpanan.store');
    Route::delete('/simpan-pinjam/setor-simpanan/{id}', [SetorSimpananController::class, 'destroy'])->name('setor.simpanan.destroy');

    Route::get('penarikan', fn() => view('simpanpinjam.penarikan'))->name('penarikan.simpanan');

    // PINJAMAN
    Route::get('pengajuan-pinjaman', fn() => view('simpanpinjam.pengajuan-pinjaman'))->name('pengajuan.pinjaman');
    Route::get('approval-pinjaman', fn() => view('simpanpinjam.approval-pinjaman'))->name('approval.pinjaman');

    // MENU LANGSUNG
    Route::get('kartu-anggota', fn() => view('simpanpinjam.kartu-anggota'))->name('kartu.anggota');
    Route::get('posting-shu', fn() => view('simpanpinjam.posting-shu'))->name('posting.shu');
});




// require __DIR__ . '/auth.php';
