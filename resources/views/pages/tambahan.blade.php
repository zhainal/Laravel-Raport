@extends('layouts.app')

@section('title')
    Data Nilai
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/tambahan.css') }}">
@endsection

@section('content')
    <section class="section-nilai">
      <div class="sidebar">
        <h1 class="heading-primary heading">Data Tambahan</h1>
        <p class="desc">Membuat, menyunting dan menghapus data tambahan siswa</p>
      </div>
      <div class="main">
        <a href="{{ route('sikap.index') }}" class="menu-item">Data Sikap</a>
        <a href="#" class="menu-item">Data Ekstrakurikuler</a>
        <a href="#" class="menu-item">Data Saran</a>
        <a href="#" class="menu-item">Data Tinggi dan Berat Badan</a>
        <a href="#" class="menu-item">Data Kondisi Kesehatan</a>
        <a href="#" class="menu-item">Data Prestasi</a>
        <a href="#" class="menu-item">Data Ketidakhadiran</a>
      </div>
    </section>
@endsection