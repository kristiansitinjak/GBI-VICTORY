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

Route::get('/gereja', function () {
    return view ('index',[
        "title"=> "HOME"
    ]);
});
Route::get('/layanan', function () {
    return view ('tampilan.layanan',[
        "title"=> "Layanan"
    ]);
});

Route::get('/lokasi', function () {
    return view ('tampilan.lokasi',[
        "title"=> "Lokasi"
    ]);
});

//untuk mengarahkan semua req ke method yang tepat
Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
Route::get('/', 'App\Http\Controllers\FaqtampilanController@index');
Route::get('/warta', 'App\Http\Controllers\WartatampilanController@index');
Route::get('/galeri', 'App\Http\Controllers\GaleritampilanController@index');
Route::get('/datajemaat', 'App\Http\Controllers\DatajemaattampilanController@index');
Route::get('/viewdatajemaat/{dataJemaatId}', 'App\Http\Controllers\DatajemaattampilanController@show');
Route::get('/jadwalibadah', 'App\Http\Controllers\JadwalibadahtampilanController@index');
Route::get('/donasi', 'App\Http\Controllers\DonasitampilanController@index');

Route::get('/datajemaat/search', 'App\Http\Controllers\DatajemaattampilanController@search')->name('datajemaat.search');

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'], '/login', 'AdminController@Login');
    Route::middleware(['admins'])->group(function(){
        Route::get('/dashboard', 'AdminController@index');
        Route::get('/logout', 'AdminController@logout');
    });
    Route::group(['middleware' => ['admins']], function () {
        Route::get('/dashboard', 'WartaController@dashboard')->name('dashboard');
        Route::get('/warta' , 'WartaController@index' );
        Route::get('/tambahwarta' , 'WartaController@create' );
        Route::post('/tambahwarta' , 'WartaController@store' );
        Route::delete('/hapuswarta/{wartaId}' , 'WartaController@destroy' );
        Route::get('/editwarta/{wartaId}' , 'WartaController@edit' );
        Route::post('/updatewarta/{wartaId}' , 'WartaController@update');
        Route::get('/pengurus' , 'PengurusController@index' );
        Route::get('/tambahpengurus' , 'PengurusController@create' );
        Route::get('/editpengurus/{pengurusId}' , 'PengurusController@edit' );
        Route::post('/updatepengurus/{pengurusId}' , 'PengurusController@update' );
        Route::delete('/hapuspengurus/{pengurusId}' , 'PengurusController@destroy' );
        Route::post('/tambahpengurus' , 'PengurusController@store');
        Route::get('/faq' , 'FaqController@index' );
        Route::get('/tambahfaq' , 'FaqController@create' );
        Route::get('/editfaq/{faqId}' , 'FaqController@edit' );
        Route::post('/updatefaq/{faqId}' , 'FaqController@update' );
        Route::delete('/hapusfaq/{faqId}' , 'FaqController@destroy' );
        Route::post('/tambahfaq' , 'FaqController@store' );
        Route::post('/tambahpengurus' , 'PengurusController@store');
        Route::get('/datajemaat' , 'DatajemaatController@index' );
        Route::get('/tambahdatajemaat' , 'DatajemaatController@create' );
        Route::get('/editdatajemaat/{datajemaatId}' , 'DatajemaatController@edit' );
        Route::get('/viewdatajemaat/{datajemaatId}' , 'DatajemaatController@show' );
        Route::post('/updatedatajemaat/{datajemaatId}' , 'DatajemaatController@update' );
        Route::delete('/hapusdatajemaat/{datajemaatId}' , 'DatajemaatController@destroy' );
        Route::post('/tambahdatajemaat' , 'DatajemaatController@store' );
        Route::get('/galeri' , 'GaleriController@index' );
        Route::get('/tambahgaleri' , 'GaleriController@create' );
        Route::get('/editgaleri/{galeriId}' , 'GaleriController@edit' );
        Route::post('/updategaleri/{galeriId}' , 'GaleriController@update' );
        Route::delete('/hapusgaleri/{galeriId}' , 'GaleriController@destroy' );
        Route::post('/tambahgaleri' , 'GaleriController@store');
        Route::get('/jadwalibadah' , 'JadwalibadahController@index' );
        Route::get('/tambahjadwalibadah' , 'JadwalibadahController@create' );
        Route::get('/editjadwalibadah/{jadwalibadahId}' , 'JadwalibadahController@edit' );
        Route::post('/updatejadwalibadah/{jadwalibadahId}' , 'JadwalibadahController@update' );
        Route::delete('/hapusjadwalibadah/{jadwalibadahId}' , 'JadwalibadahController@destroy' );
        Route::post('/tambahjadwalibadah' , 'JadwalibadahController@store');
        Route::get('/donasi' , 'DonasiController@index' );
        Route::get('/tambahdonasi' , 'DonasiController@create' );
        Route::get('/editdonasi/{donasiId}' , 'DonasiController@edit' );
        Route::post('/updatedonasi/{donasiId}', 'DonasiController@update' );
        Route::delete('/hapusdonasi/{donasiId}' , 'DonasiController@destroy' );
        Route::post('/tambahdonasi' , 'DonasiController@store');
    });
    Route::match(['get','post'], 'register', 'AdminController@register');
});
