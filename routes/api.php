<?php

use App\Http\Controllers\Api\LokasiController;
use App\Http\Controllers\Api\PertanyaanController;
use App\Http\Controllers\Api\WargaController;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('v1/get-pertanyaan', [PertanyaanController::class, 'getPertanyaan']);
Route::get('v1/get-survey', [PertanyaanController::class, 'getSurvey']);
Route::post('v1/get-pertanyaan-by-id/', [PertanyaanController::class, 'getPertanyaanById']);
Route::post('v1/post-pertanyaan-by-id/', [PertanyaanController::class, 'postJawabanById']);
Route::post('v1/delete-temporary', [PertanyaanController::class, 'delTemporary']);

Route::get('v1/get-warga', [WargaController::class, 'getWarga']);
Route::post('v1/post-biodata-warga', [WargaController::class, 'postBiodata']);
Route::post('v1/post-biodata-ktp', [WargaController::class, 'postKtp']);
Route::post('v1/post-biodata-selfi', [WargaController::class, 'postSelfi']);


Route::get('v1/get-desa', [LokasiController::class, 'getDesa']);
Route::get('v1/get-kecamatan', [LokasiController::class, 'getKecamatan']);
Route::get('v1/get-kota', [LokasiController::class, 'getKota']);

Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
