@extends('layouts.app')

@section('title')
    Data Nilai Matematika
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/matematika/edit.css') }}">
@endsection

<section class="section-show-nilai">
  <div class="sidebar">
    <h1 class="heading-primary heading">Data Nilai Matematika</h1>
    <p class="desc">Membuat, menyunting dan menghapus data nilai siswa</p>
  </div>
  <div class="main">
    <h1 class="heading-primary title heading">{{ $matematika->student["nama"] }}</h1>

    <form action="{{ route('matematika.update', $matematika->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="content">
        <div class="left">
          <div class="center">
            <div class="form-group">
              <label for="nilai-pengetahuan" class="form-label">Nilai Pengetahuan: </label>
              <input type="number" name="nilai_pengetahuan" id="nilai-pengetahuan" class="form-input" value={{$matematika->nilai_pengetahuan}}>
            </div>
            <div class="form-group">
              <label for="deskripsi_pengetahuan" class="form-label">Deskripsi:</label>
              <textarea class="form-textarea" name="deskripsi_pengetahuan" id="deskripsi_pengetahuan" cols="27" rows="3">{{$matematika->deskripsi_pengetahuan}}</textarea>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="center">
            <div class="form-group">
              <label for="nilai-keterampilan" class="form-label">Nilai Keterampilan: </label>
              <input type="number" name="nilai_keterampilan" id="nilai-keterampilan" class="form-input" value={{$matematika->nilai_keterampilan}}>
            </div>
            <div class="form-group">
              <label for="deskripsi_keterampilan" class="form-label">Deskripsi:</label>
              <textarea class="form-textarea" name="deskripsi_keterampilan" id="deskripsi_keterampilan" cols="27" rows="3">{{$matematika->deskripsi_keterampilan}}</textarea>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="form-btn">Simpan</button>
    </form>
  </div>
</section>