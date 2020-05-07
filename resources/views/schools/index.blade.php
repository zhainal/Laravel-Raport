@extends('layouts.app')

@section('title')
    Identitas Sekolah
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/school.css') }}">
@endsection

@section('content')
    <section class="section-school">
        <div class="title">
            <h1 class="heading-primary">Identitas Sekolah</h1>
            <a href="{{ route('schools.edit', $school->id) }}" class="btn-edit">Edit Data Sekolah</a>
        </div>
        <div class="main">
            <div class="left">
                <div class="form-group">
                    <label for="nama" class="label">Nama Sekolah :</label>
                    <input type="text" id="nama" class="input-form" value="{{ $school->nama }}" disabled>
                </div>
                <div class="form-group">
                    <label for="npsn" class="label">NPSN :</label>
                    <input type="text" id="npsn" class="input-form" value="{{ $school->npsn }}" disabled>
                </div>
                <div class="form-group">
                    <label for="alamat" class="label">Alamat Sekolah :</label>
                    <input type="text" id="alamat" class="input-form" value="{{ $school->alamat }}" disabled>
                </div>
                <div class="form-group">
                    <label for="kode_pos" class="label">Kode Pos :</label>
                    <input type="text" id="kode_pos" class="input-form" value="{{ $school->kode_pos }}" disabled>
                </div>
                <div class="form-group">
                    <label for="kelurahan" class="label">Kelurahan :</label>
                    <input type="text" id="kelurahan" class="input-form" value="{{ $school->kelurahan }}" disabled>
                </div>
                <div class="form-group">
                    <label for="kecamatan" class="label">Kecamatan :</label>
                    <input type="text" id="kecamatan" class="input-form" value="{{ $school->kecamatan }}" disabled>
                </div>
            </div>
            <div class="right">
                <div class="form-group">
                    <label for="provinsi" class="label">Provinsi :</label>
                    <input type="text" id="provinsi" class="input-form" value="{{ $school->provinsi }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email" class="label">Email :</label>
                    <input type="text" id="email" class="input-form" value="{{ $school->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="website" class="label">Website :</label>
                    <input type="text" id="website" class="input-form" 
                    @if ($school->website)
                        value="{{ $school->website }}"
                    @else
                        value="-"
                    @endif disabled>
                </div>
                <div class="form-group">
                    <label for="no_telp" class="label">Nomor Telepon :</label>
                    <input type="text" id="no_telp" class="input-form" value="{{ $school->no_telp }}" disabled>
                </div>
                <div class="form-group">
                    <label for="kepsek" class="label">Nama Kepala Sekolah :</label>
                    <input type="text" id="kepsek" class="input-form" value="{{ $school->kepsek }}" disabled>
                </div>
                <div class="form-group">
                    <label for="nip_kepsek" class="label">NIP Kepala Sekolah :</label>
                    <input type="text" id="nip_kepsek" class="input-form" value="{{ $school->nip_kepsek }}" disabled>
                </div>
            </div>
        </div>
    </section>
@endsection