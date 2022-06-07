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

    Route::get('/aspek-1', [AspekController::class,'index1'])->name('admin.aspek.index1');
    Route::get('/aspek-1/data', [AspekController::class,'data1'])->name('admin.aspek.data1');
    Route::get('/aspek-1/detail/{id}', [AspekController::class,'detail1'])->name('admin.aspek.detail1');
    Route::post('/aspek-1/store', [AspekController::class,'store1'])->name('admin.aspek.store1');
    Route::post('/aspek-1/delete/{id}', [AspekController::class,'delete1'])->name('admin.aspek.delete1');

    Route::get('/aspek-2/{parent_id}', [AspekController::class,'index2'])->name('admin.aspek.index2');
    Route::get('/aspek-2/{parent_id}/data', [AspekController::class,'data2'])->name('admin.aspek.data2');
    Route::get('/aspek-2/{parent_id}/detail/{id}', [AspekController::class,'detail2'])->name('admin.aspek.detail2');
    Route::post('/aspek-2/{parent_id}/store', [AspekController::class,'store2'])->name('admin.aspek.store2');
    Route::post('/aspek-2/{parent_id}/delete/{id}', [AspekController::class,'delete2'])->name('admin.aspek.delete2');

    Route::get('/aspek-3/{parent_id}', [AspekController::class,'index3'])->name('admin.aspek.index3');
    Route::get('/aspek-3/{parent_id}/data', [AspekController::class,'data3'])->name('admin.aspek.data3');
    Route::get('/aspek-3/{parent_id}/detail/{id}', [AspekController::class,'detail3'])->name('admin.aspek.detail3');
    Route::post('/aspek-3/{parent_id}/store', [AspekController::class,'store3'])->name('admin.aspek.store3');
    Route::post('/aspek-3/{parent_id}/delete/{id}', [AspekController::class,'delete3'])->name('admin.aspek.delete3');

    Route::get('/aspek-4/{parent_id}', [AspekController::class,'index4'])->name('admin.aspek.index4');
    Route::get('/aspek-4/{parent_id}/data', [AspekController::class,'data4'])->name('admin.aspek.data4');
    Route::get('/aspek-4/{parent_id}/detail/{id}', [AspekController::class,'detail4'])->name('admin.aspek.detail4');
    Route::post('/aspek-4/{parent_id}/store', [AspekController::class,'store4'])->name('admin.aspek.store4');
    Route::post('/aspek-4/{parent_id}/delete/{id}', [AspekController::class,'delete4'])->name('admin.aspek.delete4');

});