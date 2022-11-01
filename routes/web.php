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
    Route::post('edit', [MengurusController::class, 'edit']);
    Route::delete('destroy', [MengurusController::class, 'destroy']);
});





