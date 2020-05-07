@extends('layouts.app')

@section('title')
    Edit Identitas Sekolah
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/schools/edit.css')}}">
@endsection

@section('content')
<section class="section-edit">
  <div class="sidebar">
    <h1 class="heading-primary heading">Data Sekolah</h1>
    <p class="desc">Memperbarui data identitas sekolah</p>
  </div>
  <div class="main">
    <form action="{{ route('schools.update', $school->id) }}" method="post" class="form-edit">
      @csrf
      @method('PUT')

      <div class="form-body">
        <div class="left">
          <div class="form-group">
            <label for="nama" class="label">Nama Sekolah:</label>
            <input type="text" id="nama" class="form-input" name="nama" value="{{ $school->nama }}">
          </div>
          <div class="form-group">
            <label for="npsn" class="label">NPSN:</label>
            <input type="text" id="npsn" class="form-input" name="npsn" value="{{ $school->npsn }}">
          </div>
          <div class="form-group">
            <label for="alamat" class="label">Alamat Sekolah:</label>
            <input type="text" id="alamat" class="form-input" name="alamat" value="{{ $school->alamat }}">
          </div>
          <div class="form-group">
            <label for="kode_pos" class="label">Kode Pos:</label>
            <input type="text" id="kode_pos" class="form-input" name="kode_pos" value="{{ $school->kode_pos }}">
          </div>
          <div class="form-group">
            <label for="kelurahan" class="label">Kelurahan:</label>
            <input type="text" id="kelurahan" class="form-input" name="kelurahan" value="{{ $school->kelurahan }}">
          </div>
          <div class="form-group">
            <label for="kecamatan" class="label">Kecamatan:</label>
            <input type="text" id="kecamatan" class="form-input" name="kecamatan" value="{{ $school->kecamatan }}">
          </div>
        </div>
  
        <div class="right">
          <div class="form-group">
            <label for="provinsi" class="label">Provinsi:</label>
            <input type="text" id="provinsi" class="form-input" name="provinsi" value="{{ $school->provinsi }}">
          </div>
          <div class="form-group">
            <label for="email" class="label">Email:</label>
            <input type="text" id="email" class="form-input" name="email" value="{{ $school->email }}">
          </div>
          <div class="form-group">
            <label for="website" class="label">Website:</label>
            <input type="text" id="website" class="form-input" name="website" value="{{ $school->website ? $school->website : '-' }}">
          </div>
          <div class="form-group">
            <label for="no_telp" class="label">Nomor Telepon:</label>
            <input type="text" id="no_telp" class="form-input" name="no_telp" value="{{ $school->no_telp }}">
          </div>
          <div class="form-group">
            <label for="kepsek" class="label">Nama Kepala Sekolah:</label>
            <input type="text" id="kepsek" class="form-input" name="kepsek" value="{{ $school->kepsek }}">
          </div>
          <div class="form-group">
            <label for="nip_kepsek" class="label">NIP Kepala Sekolah:</label>
            <input type="text" id="nip_kepsek" class="form-input" name="nip_kepsek" value="{{ $school->nip_kepsek }}">
          </div>
        </div>
      </div>
      
      <button type="submit" class="btn-submit">Simpan</button>
    </form>
  </div>
</section>
@endsection