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

    Route::get('/perusahaan', function () {
        return view('master.perusahaan', ['title' => 'Perusahaan']);
    })->name('perusahaan');

    Route::get('/jenis-usaha', function () {
        return view('master.jenis-usaha', ['title' => 'Jenis Usaha']);
    })->name('jenis-usaha');

    Route::get('/anggota', function () {
        return view('master.anggota', ['title' => 'Anggota']);
    })->name('anggota');

    Route::get('/tipe-dokumen', function () {
        return view('master.tipe-dokumen', ['title' => 'Tipe Dokumen']);
    })->name('tipe-dokumen');

    Route::get('/pelanggan', function () {
        return view('master.pelanggan', ['title' => 'Pelanggan']);
    })->name('pelanggan');

    Route::get('/pemasok', function () {
        return view('master.pemasok', ['title' => 'Pemasok']);
    })->name('pemasok');

    Route::get('/dataassets', function () {
        return view('master.assets', ['title' => 'Assets']);
    })->name('dataassets');
});




// require __DIR__ . '/auth.php';
