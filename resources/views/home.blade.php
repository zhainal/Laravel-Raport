@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/home.css') }}">
@endsection

@section('title')
    Beranda
@endsection

@section('content')
        <div class="home-container">
            <div class="home-left">
                <h1 class="heading">
                    <span class="caps">m</span>anajemen <span class="caps">n</span>ilai <br>
                    <span class="caps">l</span>ebih <span class="caps">m</span>udah <span class="caps">d</span>engan <br>
                    <span class="caps">tenru</span>
                </h1>
                
                <p class="desc">
                    Membantu anda memanajemen penilaian siswa dengan cara mudah, nyaman dan aman
                </p>
    
                <a href="{{ route('menu') }}" class="btn">Mulai Mengolah Data</a>
            </div>
    
            <div class="home-right">
                <img src="{{ asset('img/home.jpg') }}" alt="bg-home" class="bg-home">
            </div>
    </div>
@endsection
