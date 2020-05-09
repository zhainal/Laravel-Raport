@extends('layouts.app')

@section('title')
    Data Nilai IPA
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/IPA/show.css') }}">
@endsection

<section class="section-show-nilai">
  <div class="sidebar">
    <h1 class="heading-primary heading">Data Nilai IPA</h1>
    <p class="desc">Membuat, menyunting dan menghapus data nilai siswa</p>
  </div>
  <div class="main">
    <h1 class="heading-primary title heading">{{ $IPA->student["nama"] }}</h1>
    <a href="{{ route('IPA.edit', $IPA->id) }}" class="btn-edit">Edit</a>

    <div class="content">
      <div class="left">
        <div class="center">
          <div class="form-group">
            <label for="nilai-pengetahuan" class="form-label">Nilai Pengetahuan: </label>
            <input type="text" id="nilai-pengetahuan" class="form-input" value={{$IPA->nilai_pengetahuan}} disabled>
          </div>
          <div class="form-group">
            <label for="deskripsi_pengetahuan" class="form-label">Deskripsi:</label>
            <textarea class="form-textarea" id="deskripsi_pengetahuan" cols="27" rows="3" disabled>{{$IPA->deskripsi_pengetahuan}}</textarea>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="center">
          <div class="form-group">
            <label for="nilai-keterampilan" class="form-label">Nilai Keterampilan: </label>
            <input type="text" id="nilai-keterampilan" class="form-input" value={{$IPA->nilai_keterampilan}} disabled>
          </div>
          <div class="form-group">
            <label for="deskripsi_keterampilan" class="form-label">Deskripsi:</label>
            <textarea class="form-textarea" id="deskripsi_keterampilan" cols="27" rows="3" disabled>{{$IPA->deskripsi_keterampilan}}</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>