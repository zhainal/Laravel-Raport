@extends('layouts.app')

@section('title')
    Sunting Profil
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile/edit.css') }}">
@endsection

@section('content')
    <div class="screen">

      <div class="sidebar">
        <div class="avatar">
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

      <div class="main">
        <div class="form-box">
          <h1 class="heading-form">Sunting Profil</h1>
          {{-- FORM --}}
          <form enctype="multipart/form-data" action="{{ route('profile.store', [Auth::user()->id]) }}" method="post" class="form">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <div class="form-group">
              <label for="username" class="label">Nama Pengguna</label>
              <input 
                type="text" 
                name="username" 
                id="username" 
                class="input-form" 
                value="{{ Auth::user()->username }}">

              @error('username')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="kata_sandi" class="label">Kata Sandi Baru</label>
              <input 
                type="password" 
                name="kata_sandi" 
                id="kata_sandi" 
                class="input-form">

              @error('kata_sandi')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="konfirmasi_kata_sandi" class="label">Konfirmasi Kata Sandi</label>
              <input 
                type="password" 
                name="konfirmasi_kata_sandi" 
                id="konfirmasi_kata_sandi" 
                class="input-form">

              @error('konfirmasi_kata_sandi')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              @if(Auth::user()->avatar)
                <img src="{{asset('storage/'.Auth::user()->avatar)}}" width="120px" />
                <br>
              @else 
                <p class="label">Belum ada foto profil</p>
              @endif
              <input type="file" name="avatar" id="avatar" class="input-file">
              @error('avatar')
                <p class="error-msg">{{ $message }}</p>
              @enderror
              <small class="text-muted">Kososngkan jika tidak ingin mengubah foto profil</small>
            </div>

            <button type="submit" class="btn">Simpan</button>
          </form>
        </div>
      </div>
    </div>
@endsection