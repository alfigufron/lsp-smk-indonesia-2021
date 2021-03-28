<?php

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
    return redirect()->route('view.login', 'admin');
});

Route::prefix('auth')->group(function() {
    Route::get('login/{role}', 'AuthController@viewLogin')->name('view.login');
    Route::post('login/{role}', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->name('logout');
});

Route::get('/home/{role}', 'AuthController@home')->name('home');



Route::group([
    'prefix' => 'admin',
    'middleware' => 'session.check:admin'
], function() {
    Route::prefix('jurusan')->group(function() {
        Route::get('/', 'Admin\JurusanController@viewData')->name('view.data.jurusan');
        Route::post('/', 'Admin\JurusanController@create')->name('create.data.jurusan');
        Route::get('/detail/{data}', 'Admin\JurusanController@detail')->name('detail.data.jurusan');
        Route::post('/{data}', 'Admin\JurusanController@update')->name('update.data.jurusan');
        Route::get('/{data}', 'Admin\JurusanController@delete')->name('delete.data.jurusan');
    });

    Route::prefix('kelas')->group(function() {
        Route::get('/', 'Admin\KelasController@viewData')->name('view.data.kelas');
        Route::post('/', 'Admin\KelasController@create')->name('create.data.kelas');
        Route::get('/detail/{data}', 'Admin\KelasController@detail')->name('detail.data.kelas');
        Route::post('/{data}', 'Admin\KelasController@update')->name('update.data.kelas');
        Route::get('/{data}', 'Admin\KelasController@delete')->name('delete.data.kelas');
    });

    Route::prefix('mapel')->group(function() {
        Route::get('/', 'Admin\MapelController@viewData')->name('view.data.mapel');
        Route::post('/', 'Admin\MapelController@create')->name('create.data.mapel');
        Route::get('/detail/{data}', 'Admin\MapelController@detail')->name('detail.data.mapel');
        Route::post('/{data}', 'Admin\MapelController@update')->name('update.data.mapel');
        Route::get('/{data}', 'Admin\MapelController@delete')->name('delete.data.mapel');
    });

    Route::prefix('guru')->group(function() {
        Route::get('/', 'Admin\GuruController@viewData')->name('view.data.guru');
        Route::post('/', 'Admin\GuruController@create')->name('create.data.guru');
        Route::get('/detail/{data}', 'Admin\GuruController@detail')->name('detail.data.guru');
        Route::post('/{data}', 'Admin\GuruController@update')->name('update.data.guru');
        Route::get('/{data}', 'Admin\GuruController@delete')->name('delete.data.guru');
    });

    Route::prefix('siswa')->group(function() {
        Route::get('/', 'Admin\SiswaController@viewData')->name('view.data.siswa');
        Route::post('/', 'Admin\SiswaController@create')->name('create.data.siswa');
        Route::get('/detail/{data}', 'Admin\SiswaController@detail')->name('detail.data.siswa');
        Route::post('/{data}', 'Admin\SiswaController@update')->name('update.data.siswa');
        Route::get('/{data}', 'Admin\SiswaController@delete')->name('delete.data.siswa');
    });

    Route::prefix('mengajar')->group(function() {
        Route::get('/', 'Admin\MengajarController@viewData')->name('view.data.mengajar');
        Route::post('/', 'Admin\MengajarController@create')->name('create.data.mengajar');
        Route::get('/detail/{data}', 'Admin\MengajarController@detail')->name('detail.data.mengajar');
        Route::post('/{data}', 'Admin\MengajarController@update')->name('update.data.mengajar');
        Route::get('/{data}', 'Admin\MengajarController@delete')->name('delete.data.mengajar');
    });
});



Route::group([
    'prefix' => 'guru',
    'middleware' => 'session.check:guru'
], function() {
    Route::prefix('mengajar')->group(function() {
        Route::get('/', 'Guru\MengajarController@viewData')->name('view.data.mengajar.guru');

        Route::prefix('{data_mengajar}/nilai')->group(function() {
            Route::get('/', 'Guru\NilaiController@viewData')->name('view.data.nilai');
            Route::post('/', 'Guru\NilaiController@create')->name('create.data.nilai');
            Route::get('/detail/{data_nilai}', 'Guru\NilaiController@detail')->name('detail.data.nilai');
            Route::post('/{data_nilai}', 'Guru\NilaiController@update')->name('update.data.nilai');
            Route::get('/{data_nilai}', 'Guru\NilaiController@delete')->name('delete.data.nilai');
        });
    });
});



Route::group([
    'prefix' => 'siswa',
    'middleware' => 'session.check:siswa'
], function() {
    Route::prefix('nilai')->group(function() {
        Route::get('/', 'Siswa\NilaiController@viewData')->name('view.data.nilai.siswa');
    });
});