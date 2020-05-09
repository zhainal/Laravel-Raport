@extends('layouts.app')

@section('title')
    Data Nilai SBK
@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/SBK/index.css') }}">
@endsection

@section('content')
    <section class="section-ppkn">
      <div class="sidebar">
        <h1 class="heading-primary heading">Data Nilai SBK</h1>
        <p class="desc">Membuat, menyunting dan menghapus data nilai siswa</p>
      </div>
      <div class="main">
        <div class="button">
          <a href="" class="btn-add" id="btn-add">Masukkan Data Nilai</a>

          <div class="modal">
            <h1 class="heading-primary">Import Data</h1>
            <form action="{{ route('SBK.import') }}" method="post" enctype="multipart/form-data" class="form-modal">
              @csrf
              <input type="file" class="input-file" name="nilai_SBK" id="nilai_SBK">
              <button type="submit" class="btn-import btn-form">Import Excel</button>
            </form>
          </div>

          {{-- Flash Message --}}

        {{-- Validasi File --}}
        @error('nilai_SBK')
        <div class="alert alert-danger" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @enderror

        {{-- Berhasil Upload File --}}
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{session('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        {{-- File yang di upload tidak sesuai format --}}
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
          {{session('error')}} Pastikan anda menulis data nilai siswa pada format yang telah diberikan.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        

        {{-- End Flash Message --}}

        </div>
        <div class="content">
          @if (count($SBK) >= 1)
          <table class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Nilai Pengetahuan</th>
                <th scope="col">Nilai Keterampilan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              {{-- {{dd($SBK[0]->SBK)}} --}}
              @foreach ($SBK as $p)
              <tr>
                <th scope="row">{{ $no }}</th>
                <td scope="row">{{ $p->student['nama'] }}</td>
                <td scope="row">{{ $p->nis }}</td>
                <td scope="row">{{ $p->nilai_pengetahuan }}</td>
                <td scope="row">{{ $p->nilai_keterampilan }}</td>
                <td scope="row">
                  <a href="{{ route('SBK.show', $p->id) }}" class="btn-edit">Lihat</a>
                  <a href="#" id="btn-delete" class="btn-delete">Hapus</a>

                  <div class="confirm">
                    <div class="warning">
                      <svg class="warning-svg">
                        <use xlink:href="{{ asset('img/sprite.svg#icon-warning') }}"></use>
                      </svg>
                    </div>
                    <div class="main-confirm">
                      <div class="message">
                        <p class="confirm-message">Apakah anda ingin menghapus data ini?</p>
                      </div>
                      <div class="btn-confirm">
                        <a href="#" class="btn-close">Tutup</a>
                        <form action="{{ route('SBK.destroy', $p->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn-destroy">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @php $no++; @endphp
              @endforeach
            </tbody>
          </table>

          
          @else
          <div class="empty">
            <p class="desc-dark">Belum Ada Data Nilai SBK Siswa</p>
          </div>
          @endif
        </div>
      </div>
    </section>

    <script>
      btnAdd = document.getElementById('btn-add');
      btnAdd.addEventListener('click', function(event) {
        event.preventDefault();
        
        modal = document.querySelector('.modal');

        if (modal.style.display === "") {
          modal.style.display = "block";
        } else if (modal.style.display === "block") {
          modal.style.display = "";
        }
      })

      deleteBtn = document.querySelectorAll('.btn-delete');
      for (let i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].addEventListener('click', function(e) {
          e.preventDefault();
          document.querySelectorAll('.confirm')[i].style.opacity = 1;
          document.querySelectorAll('.confirm')[i].style.visibility = 'visible';
        })  

        document.querySelectorAll('.btn-close')[i].addEventListener('click', function(e) {
          e.preventDefault();
          document.querySelectorAll('.confirm')[i].style.opacity = 0;
          document.querySelectorAll('.confirm')[i].style.visibility = 'hidden';
        })
      }
    </script>
@endsection