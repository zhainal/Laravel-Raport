@extends('layouts.app')

@section('title')
    Data Nilai
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/nilai.css') }}">
@endsection

@section('content')
    <section class="section-nilai">
      <div class="sidebar">
        <h1 class="heading-primary heading">Data Nilai</h1>
        <p class="desc">Membuat, menyunting dan menghapus data nilai siswa</p>
      </div>
      <div class="main">
        <a href="{{ route('ppkn.index') }}" class="menu-item">Pendidikan Pancasila dan Kewarganegaraan</a>
        <a href="{{ route('bahasa.index') }}" class="menu-item">Bahasa Indonesia</a>
        <a href="{{ route('matematika.index') }}" class="menu-item">Matematika</a>
        <a href="{{ route('IPA.index') }}" class="menu-item">Ilmu Pengetahuan Alam</a>
        <a href="{{ route('IPS.index') }}" class="menu-item">Ilmu Pengetahuan Sosial</a>
        <a href="{{ route('SBK.index') }}" class="menu-item">Seni Budaya dan Keterampilan</a>
        <a href="{{ route('penjas.index') }}" class="menu-item">Pendidikan Jasmani, Olahraga, dan Kesehatan</a>
        <a href="{{ route('PKLH.index') }}" class="menu-item">Muatan Lokal (PKLH)</a>
      </div>
    </section>
@endsection