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
    route::delete("/{id}/delete", "PpknController@destroy")->name("ppkn.destroy");
    route::get("/test", "PpknController@test")->name("ppkn.test");
  });
});
