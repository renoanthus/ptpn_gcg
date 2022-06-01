<?php

use App\Http\Controllers\Admin\AspekController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
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
    return redirect()->route('login');
});
Route::get('/dev/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});

Auth::routes();

Route::get('/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('/dashboard/change-password', 'DashboardController@changePassword')->name('auth.change_password');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/home', [DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/pengguna', [UserController::class,'index'])->name('admin.pengguna.index');

    Route::get('/aspek', [AspekController::class,'index'])->name('admin.aspek.index');
    Route::get('/aspek/data', [AspekController::class,'data'])->name('admin.aspek.data');
    Route::get('/aspek/detail/{id}', [AspekController::class,'detail'])->name('admin.aspek.detail');
    Route::post('/aspek/store', [AspekController::class,'store'])->name('admin.aspek.store');
    Route::post('/aspek/delete/{id}', [AspekController::class,'delete'])->name('admin.aspek.delete');

    Route::get('/sub/{parent_id}', [AspekController::class,'indexSub'])->name('admin.sub.index');
    Route::get('/sub/{parent_id}/data', [AspekController::class,'dataSub'])->name('admin.sub.data');
    Route::get('/sub/{parent_id}/detail/{id}', [AspekController::class,'detailSub'])->name('admin.sub.detail');
    Route::post('/sub/{parent_id}/store', [AspekController::class,'storeSub'])->name('admin.sub.store');
    Route::post('/sub/{parent_id}/delete/{id}', [AspekController::class,'deleteSub'])->name('admin.sub.delete');
});