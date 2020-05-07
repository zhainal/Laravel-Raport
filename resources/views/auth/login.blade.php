<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="stylesheet" href="{{asset('css/font/poppins.css')}}">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  <title>Masuk &verbar; Asisten Guru</title>
</head>
<body>
  <section class="screen">
    <div class="login">

      <div class="left">
        <p class="login-p capital">Selamat Datang di</p>
        <img src="{{asset('img/tenru-logo.jpg')}}" alt="tenru logo" class="logo">
        <p class="login-desc">
          Silahkan Masukkan Nama Pengguna dan Kata Sandi Anda untuk Melanjutkan
        </p>

        <form action="{{route('login')}}" method="POST" class="login-form">
          @csrf
          <div class="form-group">
            <input type="text" id="username" name="username" placeholder="Nama Pengguna" class="input-form @error('username') error @enderror" value={{ old('username') }}>

            @error('username')
              <p class="error-msg">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Kata Sandi" class="input-form @error('password') error @enderror">

            @error('password')
              <p class="error-msg">{{ $message }}</p>
            @enderror
          </div>

          <button type="submit" class="submit-form">Masuk</button>
        </form>
      </div>

      <div class="right">
        <div class="desc">
          <img src="{{asset('img/tenru-logo-white.png')}}" alt="tenru logo white" class="logo-white">
          <p class="desc-p">
            Tenru (Asisten Guru) website yang dapat membantu guru dalam memanajemen penilaian siswa dengan cara mudah, nyaman dan aman.
          </p>
        </div>
      </div>

    </div>
  </section>
</body>
</html>