@extends('layouts.app')

@section('title')
    Data Nilai IPA
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/IPA/edit.css') }}">
@endsection

<section class="section-show-nilai">
  <div class="sidebar">
    <h1 class="heading-primary heading">Data Nilai IPA</h1>
    <p class="desc">Membuat, menyunting dan menghapus data nilai siswa</p>
  </div>
  <div class="main">
    <h1 class="heading-primary title heading">{{ $IPA->student["nama"] }}</h1>

    <form action="{{ route('IPA.update', $IPA->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="content">
        <div class="left">
          <div class="center">
            <div class="form-group">
              <label for="nilai-pengetahuan" class="form-label">Nilai Pengetahuan: </label>
              <input type="number" name="nilai_pengetahuan" id="nilai-pengetahuan" class="form-input" value={{$IPA->nilai_pengetahuan}}>
            </div>
            <div class="form-group">
              <label for="deskripsi_pengetahuan" class="form-label">Deskripsi:</label>
              <textarea class="form-textarea" name="deskripsi_pengetahuan" id="deskripsi_pengetahuan" cols="27" rows="3">{{$IPA->deskripsi_pengetahuan}}</textarea>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="center">
            <div class="form-group">
              <label for="nilai-keterampilan" class="form-label">Nilai Keterampilan: </label>
              <input type="number" name="nilai_keterampilan" id="nilai-keterampilan" class="form-input" value={{$IPA->nilai_keterampilan}}>
            </div>
            <div class="form-group">
              <label for="deskripsi_keterampilan" class="form-label">Deskripsi:</label>
              <textarea class="form-textarea" name="deskripsi_keterampilan" id="deskripsi_keterampilan" cols="27" rows="3">{{$IPA->deskripsi_keterampilan}}</textarea>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="form-btn">Simpan</button>
    </form>
  </div>
</section>