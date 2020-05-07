@extends('layouts.app')

@section('title')
    Data Tambahan Siswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/extra/edit.css') }}">
@endsection

<section class="section-sikap">
  <div class="sidebar">
    <h1 class="heading-primary heading">Data Tambahan</h1>
    <p class="desc">Membuat, menyunting dan menghapus data tambahan siswa</p>
  </div>
  <div class="main">
    <h1 class="heading-primary title heading">{{ $extra->student["nama"] }}</h1>

    <form action="{{ route('extra.update', $extra->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="content">
        <div class="left">
          <div class="center">
            <div class="form-group">
              <label for="ekskul" class="form-label">Ekstra Kurikuler:</label>
              <input type="text" id="ekskul" name="ekskul" class="form-input" value="{{ $extra->ekskul }}">
            </div>
            <div class="form-group">
              <label for="saran" class="form-label">Saran:</label>
              <textarea class="form-textarea" name="saran" id="saran" cols="15" rows="3">{{$extra->saran}}</textarea>
            </div>
            <div class="form-group">
              <label for="tinggi_sem1" class="form-label">Tinggi Semester 1 (cm):</label>
              <input type="number" id="tinggi_sem1" name="tinggi_sem1" class="form-input" value="{{ $extra->tinggi_sem1 }}">
            </div>
            <div class="form-group">
              <label for="tinggi_sem2" class="form-label">Tinggi Semester 2 (cm):</label>
              <input type="number" id="tinggi_sem2" name="tinggi_sem2" class="form-input" value="{{ $extra->tinggi_sem2 }}">
            </div>
            <div class="form-group">
              <label for="berat_sem1" class="form-label">Berat Badan Semester 1 (kg):</label>
              <input type="number" id="berat_sem1" name="berat_sem1" class="form-input" value="{{ $extra->berat_sem1 }}">
            </div>
            <div class="form-group">
              <label for="berat_sem2" class="form-label">Berat Badan Semester 2 (kg):</label>
              <input type="number" id="berat_sem2" name="berat_sem2" class="form-input" value="{{ $extra->berat_sem2 }}">
            </div>
            <div class="form-group">
              <label for="pendengaran" class="form-label">Kondisi Pendengaran:</label>
              <input type="text" id="pendengaran" name="pendengaran" class="form-input" value="{{ $extra->pendengaran }}">
            </div>
          </div>
        </div>
        <div class="right">
          <div class="center">
            <div class="form-group">
              <label for="penglihatan" class="form-label">Kondisi Penglihatan:</label>
              <input type="text" id="penglihatan" name="penglihatan" class="form-input" value="{{ $extra->penglihatan }}">
            </div>
            <div class="form-group">
              <label for="gigi" class="form-label">Kondisi Gigi:</label>
              <input type="text" id="gigi" name="gigi" class="form-input" value="{{ $extra->gigi }}">
            </div>
            <div class="form-group">
              <label for="prestasi" class="form-label">Prestasi:</label>
              <textarea class="form-textarea" name="prestasi" id="prestasi" cols="15" rows="3">{{$extra->prestasi}}</textarea>
            </div>
            <div class="form-group">
              <label for="jenis_prestasi" class="form-label">Jenis Prestasi:</label>
              <input type="text" id="jenis_prestasi" name="jenis_prestasi" class="form-input" value="{{ $extra->jenis_prestasi }}">
            </div>
            <div class="form-group">
              <label for="sakit" class="form-label">Sakit (Hari):</label>
              <input type="number" id="sakit" name="sakit" class="form-input" value="{{ $extra->sakit }}">
            </div>
            <div class="form-group">
              <label for="ijin" class="form-label">ijin (Hari):</label>
              <input type="number" id="ijin" name="ijin" class="form-input" value="{{ $extra->ijin }}">
            </div>
            <div class="form-group">
              <label for="alfa" class="form-label">Tanpa Keterangan (Hari):</label>
              <input type="number" id="alfa" name="alfa" class="form-input" value="{{ $extra->alfa }}">
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="form-btn">Simpan</button>
    </form>
  </div>
</section>