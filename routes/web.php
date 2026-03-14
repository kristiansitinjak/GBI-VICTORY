<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WartaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqtampilanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\DatajemaatController;
use App\Http\Controllers\DatajemaattampilanController;
use App\Http\Controllers\WartatampilanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GaleritampilanController;
use App\Http\Controllers\JadwalibadahController;
use App\Http\Controllers\JadwalibadahtampilanController;
use App\Http\Controllers\DonasitampilanController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PendingJemaatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =============================================
// HALAMAN STATIS
// =============================================
Route::get('/gereja', function () {
    return view('index', ["title" => "HOME"]);
});

// =============================================
// HALAMAN PUBLIK - User Tampilan
// =============================================

// Home
Route::get('/', 'App\Http\Controllers\HomeController@index');

// Profile & FAQ
Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
Route::get('/faq', 'App\Http\Controllers\FaqtampilanController@index');
Route::get('/lokasi', 'App\Http\Controllers\HomeController@lokasi');

// Warta Jemaat
Route::get('/warta', 'App\Http\Controllers\WartatampilanController@index');
Route::get('/warta/{id}', 'App\Http\Controllers\WartatampilanController@show');

// Galeri
Route::get('/galeri', 'App\Http\Controllers\GaleritampilanController@index');

// Jadwal Ibadah
Route::get('/jadwalibadah', 'App\Http\Controllers\JadwalibadahtampilanController@index');
Route::get('/jadwalibadah/{id}', 'App\Http\Controllers\JadwalibadahtampilanController@show');
Route::get('/jadwalibadah/{id}', [JadwalibadahtampilanController::class, 'show']);
Route::get('/jadwalibadah/{id}/nats', [JadwalibadahtampilanController::class, 'nats']);

// Data Jemaat
Route::get('/datajemaat', 'App\Http\Controllers\DatajemaattampilanController@index');
Route::get('/datajemaat/search', 'App\Http\Controllers\DatajemaattampilanController@search')->name('datajemaat.search');
Route::get('/viewdatajemaat/{dataJemaatId}', 'App\Http\Controllers\DatajemaattampilanController@show');

// Donasi
Route::get('/donasi', 'App\Http\Controllers\DonasitampilanController@index');

// Pendaftaran Jemaat
Route::get('pendaftaran-jemaat', [PendingJemaatController::class, 'showForm']);
Route::post('pendaftaran-jemaat', [PendingJemaatController::class, 'submit']);

// =============================================
// ADMIN ROUTES
// =============================================
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {

    Route::match(['get', 'post'], '/login', 'AdminController@Login');
    Route::match(['get', 'post'], 'register', 'AdminController@register');

    Route::group(['middleware' => ['admins']], function () {

        // Dashboard - gabung jadi 1, pakai WartaController karena dia yang kirim data chart & donasi
        Route::get('/dashboard', 'WartaController@dashboard')->name('dashboard');
        Route::get('/logout', 'AdminController@logout');

        // Pending Jemaat
        Route::get('/pending-debug', [\App\Http\Controllers\PendingJemaatController::class, 'debugAll']);
        Route::get('/pending-jemaat', [PendingJemaatController::class, 'index']);
        Route::post('/pending-jemaat/{id}/approve', [PendingJemaatController::class, 'approve']);
        Route::post('/pending-jemaat/{id}/reject', [PendingJemaatController::class, 'reject']);

        // Warta
        Route::get('/warta', 'WartaController@index');
        Route::get('/tambahwarta', 'WartaController@create');
        Route::post('/tambahwarta', 'WartaController@store');
        Route::get('/editwarta/{wartaId}', 'WartaController@edit');
        Route::post('/updatewarta/{wartaId}', 'WartaController@update');
        Route::delete('/hapuswarta/{wartaId}', 'WartaController@destroy');

        // Pengurus
        Route::get('/pengurus', 'PengurusController@index');
        Route::get('/tambahpengurus', 'PengurusController@create');
        Route::post('/tambahpengurus', 'PengurusController@store');
        Route::get('/editpengurus/{pengurusId}', 'PengurusController@edit');
        Route::post('/updatepengurus/{pengurusId}', 'PengurusController@update');
        Route::delete('/hapuspengurus/{pengurusId}', 'PengurusController@destroy');

        // FAQ
        Route::get('/faq', 'FaqController@index');
        Route::get('/tambahfaq', 'FaqController@create');
        Route::post('/tambahfaq', 'FaqController@store');
        Route::get('/editfaq/{faqId}', 'FaqController@edit');
        Route::post('/updatefaq/{faqId}', 'FaqController@update');
        Route::delete('/hapusfaq/{faqId}', 'FaqController@destroy');

        // Data Jemaat
        Route::get('/datajemaat', 'DatajemaatController@index');
        Route::get('/tambahdatajemaat', 'DatajemaatController@create');
        Route::post('/tambahdatajemaat', 'DatajemaatController@store');
        Route::get('/editdatajemaat/{datajemaatId}', 'DatajemaatController@edit');
        Route::post('/updatedatajemaat/{datajemaatId}', 'DatajemaatController@update');
        Route::delete('/hapusdatajemaat/{datajemaatId}', 'DatajemaatController@destroy');
        Route::get('/datajemaat/view/{datajemaatId}', 'DatajemaatController@viewDetail');
        Route::get('/datajemaat/cetak-kta/{id}', 'DatajemaatController@cetakKTA')->name('jemaat.cetak-kta');

        // Galeri
        Route::get('/galeri', 'GaleriController@index');
        Route::get('/tambahgaleri', 'GaleriController@create');
        Route::post('/tambahgaleri', 'GaleriController@store');
        Route::get('/editgaleri/{galeriId}', 'GaleriController@edit');
        Route::post('/updategaleri/{galeriId}', 'GaleriController@update');
        Route::delete('/hapusgaleri/{galeriId}', 'GaleriController@destroy');

        // Jadwal Ibadah
        Route::get('/jadwalibadah', 'JadwalibadahController@index');
        Route::get('/tambahjadwalibadah', 'JadwalibadahController@create');
        Route::post('/tambahjadwalibadah', 'JadwalibadahController@store');
        Route::get('/editjadwalibadah/{jadwalibadahId}', 'JadwalibadahController@edit');
        Route::post('/updatejadwalibadah/{jadwalibadahId}', 'JadwalibadahController@update');
        Route::delete('/hapusjadwalibadah/{jadwalibadahId}', 'JadwalibadahController@destroy');


        // Donasi
        Route::get('/donasi', 'DonasiController@index');
        Route::get('/tambahdonasi', 'DonasiController@create');
        Route::post('/tambahdonasi', 'DonasiController@store');
        Route::get('/editdonasi/{donasiId}', 'DonasiController@edit');
        Route::post('/updatedonasi/{donasiId}', 'DonasiController@update');
        Route::delete('/hapusdonasi/{donasiId}', 'DonasiController@destroy');
    });
});