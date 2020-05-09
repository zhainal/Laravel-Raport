<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'auth.login')->middleware('guest');

Auth::routes(['register' => false]);

Route::get('/beranda', 'HomeController@index')->name('home');
Route::view('/menu', 'pages.menu')->middleware('auth')->name('menu');

// Route School
Route::group(["prefix" => "/sekolah", "middleware" => "auth"], function () {
  Route::get("/", "SchoolController@index")->name("schools.index");
  Route::get("/{id}", "SchoolController@edit")->name("schools.edit");
  Route::put("/{id}", "SchoolController@update")->name("schools.update");
});

// Route Profile
Route::group(["prefix" => "/profil", "middleware" => "auth"], function () {
  Route::get("/", "UserController@index")->name("profile.index");
  Route::get("/edit", "UserController@edit")->name("profile.edit");
  Route::put("/edit/{id}", "UserController@store")->name("profile.store");
});

// Route Data Siswa
Route::group(["prefix" => "/data-siswa", "middleware" => "auth"], function () {
  route::get('/', "StudentsController@index")->name("students.index");
  route::post('/', "StudentsController@import")->name("students.import");
  route::get('/{id}/edit', "StudentsController@edit")->name("students.edit");
  route::put('/{id}/edit', "StudentsController@update")->name("students.update");
  route::delete('/{id}/delete', "StudentsController@destroy")->name("students.destroy");
});

// Route Data Nilai
Route::group(["prefix" => "/data-nilai", "middleware" => "auth"], function () {
  Route::view("/", "pages.nilai")->name("nilai");

  Route::group(["prefix" => "/ppkn"], function () {
    Route::get("/", "PpknController@index")->name("ppkn.index");
    Route::post("/", "PpknController@import")->name("ppkn.import");
    Route::get("/{id}", "PpknController@show")->name("ppkn.show");
    Route::get("/{id}/edit", "PpknController@edit")->name("ppkn.edit");
    Route::patch("/{id}/edit", "PpknController@update")->name("ppkn.update");
    Route::delete("/{id}/delete", "PpknController@destroy")->name("ppkn.destroy");
  });

  Route::group(["prefix" => "/bahasa"], function () {
    Route::get("/", "BahasaController@index")->name("bahasa.index");
    Route::post("/", "BahasaController@import")->name("bahasa.import");
    Route::get("/{id}", "BahasaController@show")->name("bahasa.show");
    Route::get("/{id}/edit", "BahasaController@edit")->name("bahasa.edit");
    Route::patch("/{id}/edit", "BahasaController@update")->name("bahasa.update");
    Route::delete("/{id}/delete", "BahasaController@destroy")->name("bahasa.destroy");
  });

  Route::group(["prefix" => "/matematika"], function () {
    Route::get("/", "MatematikaController@index")->name("matematika.index");
    Route::post("/", "MatematikaController@import")->name("matematika.import");
    Route::get("/{id}", "MatematikaController@show")->name("matematika.show");
    Route::get("/{id}/edit", "MatematikaController@edit")->name("matematika.edit");
    Route::patch("/{id}/edit", "MatematikaController@update")->name("matematika.update");
    Route::delete("/{id}/delete", "MatematikaController@destroy")->name("matematika.destroy");
  });

  Route::group(["prefix" => "/IPA"], function () {
    Route::get("/", "IPAController@index")->name("IPA.index");
    Route::post("/", "IPAController@import")->name("IPA.import");
    Route::get("/{id}", "IPAController@show")->name("IPA.show");
    Route::get("/{id}/edit", "IPAController@edit")->name("IPA.edit");
    Route::patch("/{id}/edit", "IPAController@update")->name("IPA.update");
    Route::delete("/{id}/delete", "IPAController@destroy")->name("IPA.destroy");
  });

  Route::group(["prefix" => "/IPS"], function () {
    Route::get("/", "IPSController@index")->name("IPS.index");
    Route::post("/", "IPSController@import")->name("IPS.import");
    Route::get("/{id}", "IPSController@show")->name("IPS.show");
    Route::get("/{id}/edit", "IPSController@edit")->name("IPS.edit");
    Route::patch("/{id}/edit", "IPSController@update")->name("IPS.update");
    Route::delete("/{id}/delete", "IPSController@destroy")->name("IPS.destroy");
  });

  Route::group(["prefix" => "/SBK"], function () {
    Route::get("/", "SBKController@index")->name("SBK.index");
    Route::post("/", "SBKController@import")->name("SBK.import");
    Route::get("/{id}", "SBKController@show")->name("SBK.show");
    Route::get("/{id}/edit", "SBKController@edit")->name("SBK.edit");
    Route::patch("/{id}/edit", "SBKController@update")->name("SBK.update");
    Route::delete("/{id}/delete", "SBKController@destroy")->name("SBK.destroy");
  });

  Route::group(["prefix" => "/penjas"], function () {
    Route::get("/", "PenjasController@index")->name("penjas.index");
    Route::post("/", "PenjasController@import")->name("penjas.import");
    Route::get("/{id}", "PenjasController@show")->name("penjas.show");
    Route::get("/{id}/edit", "PenjasController@edit")->name("penjas.edit");
    Route::patch("/{id}/edit", "PenjasController@update")->name("penjas.update");
    Route::delete("/{id}/delete", "PenjasController@destroy")->name("penjas.destroy");
  });

  Route::group(["prefix" => "/PKLH"], function () {
    Route::get("/", "PKLHController@index")->name("PKLH.index");
    Route::post("/", "PKLHController@import")->name("PKLH.import");
    Route::get("/{id}", "PKLHController@show")->name("PKLH.show");
    Route::get("/{id}/edit", "PKLHController@edit")->name("PKLH.edit");
    Route::patch("/{id}/edit", "PKLHController@update")->name("PKLH.update");
    Route::delete("/{id}/delete", "PKLHController@destroy")->name("PKLH.destroy");
  });
});

// Route Data Tambahan
Route::group(["prefix" => "/data-tambahan", "middleware" => "auth"], function () {
  Route::view("/", "pages.tambahan")->name("tambahan");

  // Data Sikap
  Route::group(["prefix" => "/sikap"], function () {
    Route::get("/", "SikapController@index")->name("sikap.index");
    Route::post("/", "SikapController@import")->name("sikap.import");
    Route::get("/{id}", "SikapController@edit")->name("sikap.edit");
    Route::patch("/{id}", "SikapController@update")->name("sikap.update");
    Route::delete("/{id}/delete", "SikapController@destroy")->name("sikap.destroy");
  });

  // Data Lainnya
  Route::group(["prefix" => "/lainnya"], function () {
    Route::get("/", "ExtraController@index")->name('extra.index');
    Route::post("/", "ExtraController@import")->name('extra.import');
    Route::get("/{id}", "ExtraController@edit")->name('extra.edit');
    Route::patch("/{id}", "ExtraController@update")->name('extra.update');
    Route::delete("/{id}/delete", "ExtraController@destroy")->name("extra.destroy");
  });
});
