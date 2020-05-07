@extends('layouts.app')

@section('title')
    Data Sikap Siswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sikap/edit.css') }}">
@endsection

<section class="section-sikap">
  <div class="sidebar">
    <h1 class="heading-primary heading">Data Sikap</h1>
    <p class="desc">Membuat, menyunting dan menghapus data sikap siswa</p>
  </div>
  <div class="main">
    <h1 class="heading-primary title heading">{{ $sikap->student["nama"] }}</h1>

    <form action="#" method="POST">
      @csrf
      @method('PATCH')
      <div class="content">
        <div class="left">
          <div class="center">
            <div class="form-group">
              <label for="sikap_spiritual" class="form-label">Sikap Spiritual:</label>
              <textarea class="form-textarea" name="sikap_spiritual" id="sikap_spiritual" cols="20" rows="3">{{$sikap->sikap_spiritual}}</textarea>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="center">
            <div class="form-group">
              <label for="sikap_sosial" class="form-label">Sikap Sosial:</label>
              <textarea class="form-textarea" name="sikap_sosial" id="sikap_sosial" cols="20" rows="3">{{$sikap->sikap_sosial}}</textarea>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="form-btn">Simpan</button>
    </form>
  </div>
</section>