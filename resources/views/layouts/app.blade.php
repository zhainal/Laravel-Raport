<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  {{-- Font --}}
  <link rel="stylesheet" href="{{ asset('css/font/poppins.css') }}">

  @yield('script')

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('css')
  <title>@yield('title') &verbar; Asisten Guru</title>
</head>
<body>
  <div class="container">
    {{-- Navbar --}}
    <div class="navbar">
      {{-- Logo --}}
      <div class="navbar-logo">
        <a href="{{ route('home') }}">
          <img src="{{ asset('img/tenru-logo.jpg') }}" alt="Logo Tenru" class="logo-img">
        </a>
      </div>
      {{-- Nav-link --}}
      <div class="nav-link">
        <a 
          href="{{ route('students.index') }}" 
          class="nav-item {{ Request::is('data-siswa*') ? 'active' : '' }}">Data Siswa</a>
        <a 
          href="{{ route('nilai') }}" 
          class="nav-item {{ Request::is('data-nilai*') ? 'active' : '' }}">Data Nilai</a>
        <a 
          href="{{ route('tambahan') }}" 
          class="nav-item {{ Request::is('data-tambahan*') ? 'active' : '' }}">Data Tambahan</a>
        <a 
          href="{{ route('schools.index') }}" 
          class="nav-item {{ Request::is('sekolah*') ? 'active' : '' }}">Identitas Sekolah</a>
        <p class="separator">&verbar;</p>
        <a 
          href="{{ route('profile.index') }}" 
          class="nav-item {{ Request::is('profil*') ? 'active' : '' }}">Profil</a>
        <a class="nav-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            Keluar
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </div>
  </div>
  @yield('content')

  @yield('myscript')
</body>
</html>