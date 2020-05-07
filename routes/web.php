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
  route::view("/", "pages.nilai")->name("nilai");

  route::group(["prefix" => "/ppkn"], function () {
    route::get("/", "PpknController@index")->name("ppkn.index");
    route::post("/", "PpknController@import")->name("ppkn.import");
    route::get("/{id}", "PpknController@show")->name("ppkn.show");
    route::get("/{id}/edit", "PpknController@edit")->name("ppkn.edit");
    route::patch("/{id}/edit", "PpknController@update")->name("ppkn.update");
    route::delete("/{id}/delete", "PpknController@destroy")->name("ppkn.destroy");
  });
});

// Route Data Tambahan
Route::group(["prefix" => "/data-tambahan", "middleware" => "auth"], function () {
  route::view("/", "pages.tambahan")->name("tambahan");

  // Data Sikap
  route::group(["prefix" => "/sikap"], function () {
    route::get("/", "SikapController@index")->name("sikap.index");
    route::post("/", "SikapController@import")->name("sikap.import");
    route::get("/{id}", "SikapController@edit")->name("sikap.edit");
    route::patch("/{id}", "SikapController@update")->name("sikap.update");
    route::delete("/{id}/delete", "SikapController@destroy")->name("sikap.destroy");
  });

  // Data Lainnya
  route::group(["prefix" => "/lainnya"], function () {
    route::get("/", "ExtraController@index")->name('extra.index');
    route::post("/", "ExtraController@import")->name('extra.import');
    route::get("/{id}", "ExtraController@edit")->name('extra.edit');
    route::patch("/{id}", "ExtraController@update")->name('extra.update');
    route::delete("/{id}/delete", "ExtraController@destroy")->name("extra.destroy");
  });
});
