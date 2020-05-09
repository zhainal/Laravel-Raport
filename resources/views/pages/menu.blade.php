@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('title')
    Menu
@endsection

@section('content')
  <div class="menu-container">
    <div class="menu-box">
      <div class="rapor-box">
        <a href="{{ route('students.index') }}" class="rapor-link">
          Rapor 
            <svg class="rapor-svg">
              <use xlink:href="{{ asset('img/sprite.svg#icon-book') }}"></use>
            </svg>
        </a>
      </div>
      <div class="menu">
        <a href="{{ route('students.index') }}" class="data-siswa">
          <svg class="icon-svg">
            <use xlink:href="{{ asset('img/sprite.svg#icon-person') }}"></use>
          </svg>
          <h1 class="heading-menu">Data Siswa</h1>
          <p class="menu-desc">
            Guru dapat melihat, membuat, memperbarui dan menghapus data siswa
          </p>
        </a>
        <a href="{{ route('nilai') }}" class="data-nilai">
          <svg class="icon-svg">
            <use xlink:href="{{ asset('img/sprite.svg#icon-briefcase') }}"></use>
          </svg>
          <h1 class="heading-menu">Data Nilai</h1>
          <p class="menu-desc">
            Guru dapat melihat, membuat, memperbarui dan menghapus data nilai
          </p>
        </a>
        <a href="#" class="data-tambahan">
          <svg class="icon-svg">
            <use xlink:href="{{ asset('img/sprite.svg#icon-bulb') }}"></use>
          </svg>
          <h1 class="heading-menu">Data Tambahan</h1>
          <p class="menu-desc">
            Guru dapat melihat, membuat, memperbarui dan menghapus data tambahan
          </p>
        </a>
      </div>
    </div>
  </div>
@endsection