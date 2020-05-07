@extends('layouts.app')

@section('title')
  Profil
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/profile/index.css') }}">
@endsection

@section('content')
  <section class="screen">
    <div class="profile-box">

      <div class="left">
        <h1 class="heading-primary">
          Selamat Datang, {{ explode(" ", Auth::user()->username)[0] }}.
        </h1>
        <p class="desc">
          Dengan TENRU ubah informasi akun menjadi lebih mudah, aman dan nyaman.
        </p>
        <a href="{{ route('profile.edit') }}" class="btn">Perbarui Profil &rarr;</a>
      </div>

      <div class="right">
        <div class="avatar">
          {{-- TODO: Ganti avatar dengan avatar pengguna --}}
          @if (Auth::user()->avatar)
          <img src="{{ asset('storage/' .Auth::user()->avatar) }}" alt="avatar" class="avatar-img">
          @else
          <img src="{{ asset('img/profile.png') }}" alt="avatar" class="default">
          @endif
        </div>
        <div class="identitas">
          <h1 class="username">{{ Auth::user()->username }}</h1>
          <p class="guru">Guru</p>
        </div>
      </div>
    </div>
  </section>
@endsection