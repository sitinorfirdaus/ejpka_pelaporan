<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SenaraiPenggunaController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\UserList2Controller;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\SenaraiAgensiController;
use App\Http\Controllers\BelanjawanController;
use App\Http\Controllers\MengurusController;
use App\Http\Controllers\EksekutifController;
use App\Http\Controllers\RingkasanEksekutifController;
use App\Http\Controllers\RingkasanController;
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
    return view('auth.login');
});

// Route::get('/senaraipengguna', function () {
//     return view('senaraipengguna');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/editprofile', [UserProfileController::class, 'edit'])->name('editprofile');
Route::put('/editprofile', [UserProfileController::class, 'update'])->name('updateprofile');



Route::prefix('userlist2')->group(function () {
    Route::get('index', [UserList2Controller::class, 'index']);
    Route::post('store', [UserList2Controller::class, 'store']);
    Route::post('edit', [UserList2Controller::class, 'edit']);
    Route::delete('destroy', [UserList2Controller::class, 'destroy']);
});

Route::prefix('agensi')->group(function () {
    Route::get('index', [SenaraiAgensiController::class, 'index']);
    Route::post('store', [SenaraiAgensiController::class, 'store']);
    Route::post('edit', [SenaraiAgensiController::class, 'edit']);
    Route::delete('destroy', [SenaraiAgensiController::class, 'destroy']);
});



Route::prefix('belanjawan')->group(function () {
    Route::get('index', [BelanjawanController::class, 'index']);
    Route::post('store', [BelanjawanController::class, 'store']);
    Route::post('edit', [BelanjawanController::class, 'edit']);
    Route::delete('destroy', [BelanjawanController::class, 'destroy']);
});

Route::prefix('mengurus')->group(function () {
    Route::get('index', [MengurusController::class, 'index']);
    Route::post('store', [MengurusController::class, 'store']);
    Route::post('stor_2', [MengurusController::class, 'store_2']);
    Route::post('edit', [MengurusController::class, 'edit']);
    Route::delete('destroy', [MengurusController::class, 'destroy']);
    Route::post('update', [MengurusController::class, 'update']);
    Route::get('form', [MengurusController::class, 'form']);
    Route::get('tab2', [MengurusController::class, 'tab2']);

});


Route::prefix('master')->group(function () {
    Route::get('index', [EksekutifController::class, 'index']);
    Route::post('store', [EksekutifController::class, 'store']);
    Route::post('edit', [EksekutifController::class, 'edit']);
    Route::delete('destroy', [EksekutifController::class, 'destroy']);
    Route::post('update/{id}', [EksekutifController::class, 'update']);
    Route::get('show', [EksekutifController::class, 'show']);

});

Route::prefix('ringkasan_eksekutif')->group(function () {
    Route::get('create', [RingkasanEksekutifController::class, 'create']);
    Route::get('index', [RingkasanEksekutifController::class, 'index']);
    Route::post('store', [RingkasanEksekutifController::class, 'store']);
   // Route::post('edit', [RingkasanEksekutifController::class, 'edit']);
    Route::get('edit/{id}', [RingkasanEksekutifController::class, 'edit']);
    Route::delete('destroy', [RingkasanEksekutifController::class, 'destroy']);
    Route::post('update/{id}', [RingkasanEksekutifController::class, 'update']);
    Route::get('form', [RingkasanEksekutifController::class, 'form']);
});

// Ringkasan Module

// Route::get('/ringkasan', [RingkasanController::class, 'index'])->name('ringkasan.index');
// Route::get('/ringkasan/create', [RingkasanController::class, 'create'])->name('ringkasan.create');
// Route::post('/ringkasan/create', [RingkasanController::class, 'store'])->name('ringkasan.store');
// Route::get('/ringkasan/show/{id}', [RingkasanController::class, 'show'])->name('ringkasan.show');
// Route::get('/ringkasan/edit/{id}', [RingkasanController::class, 'edit'])->name('ringkasan.edit');
// Route::post('/ringkasan/edit/{id}', [RingkasanController::class, 'update'])->name('ringkasan.update');
// Route::get('/ringkasan/destroy/{id}', [RingkasanController::class, 'destroy'])->name('ringkasan.destroy');


Route::get('ringkasan/create', [RingkasanController::class, 'create'])->name('create');
Route::post('/ringkasan/create', [RingkasanController::class, 'store'])->name('create');
Route::get('/list', [RingkasanController::class, 'index'])->name('list');
Route::get('edit-ringkasan/{id}', [RingkasanController::class, 'edit'])->name('edit');
Route::post('update-ringkasan/{id}', [RingkasanController::class, 'update'])->name('update');
Route::get('delete-ringkasan/{id}', [RingkasanController::class, 'destroy'])->name('delete');
Route::get('ringkasan/edit2', [RingkasanController::class, 'edit2'])->name('edit2');
// Route::get('ringkasan/show', [RingkasanController::class, 'show'])->name('show');


