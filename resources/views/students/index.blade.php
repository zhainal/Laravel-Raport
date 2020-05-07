@extends('layouts.app')

@section('title')
    Data Siswa
@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/data-siswa/index.css') }}">
@endsection

@section('content')
    <section class="section-siswa">
      <div class="sidebar">
        <h1 class="heading-primary heading">Data Siswa</h1>
        <p class="desc">Membuat, menyunting dan menghapus data siswa</p>
      </div>
      <div class="main">
        <div class="menu">
          <input type="checkbox" class="checkbox-modal" name="trigger-modal" id="trigger-modal">
          <label for="trigger-modal" class="btn-import btn">Tambah Data Siswa</label>
  
          <div class="modal">
            <h1 class="heading-primary">Import Data</h1>
            <form action="{{ route('students.import') }}" method="post" enctype="multipart/form-data" class="form-modal">
              @csrf
              <input type="file" class="input-file" name="data_siswa" id="data_siswa">
              <button type="submit" class="btn-import btn-form">Import Excel</button>
            </form>
          </div>
        </div>

        {{-- Flash Message --}}

        {{-- Validasi File --}}
        @error('data_siswa')
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
          {{session('error')}} Pastikan anda menulis data siswa pada format yang telah diberikan.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        

        {{-- End Flash Message --}}

        <div class="table-siswa">
          @if (count($students) >= 1)
          <table class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">NISN</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach ($students as $student)
              <tr>
                <th scope="row">{{ $no }}</th>
                <td scope="row">{{ $student->nama }}</td>
                <td scope="row">{{ $student->nis }}</td>
                <td scope="row">{{ $student->nisn }}</td>
                <td scope="row">{{ $student->kelas }}</td>
                <td scope="row">
                  <a href="{{ route('students.edit', $student->id) }}" class="btn-edit">Edit</a>
                  <a href="#" id="btn-delete" data-user={{$student->id}} class="btn-delete">Hapus</a>
                  
                </td>
                    <div class="confirm-msg">
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
                          <form class="form-confirm" action="{{ route('students.destroy', $student->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-destroy">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>
              </tr>
              @php $no++; @endphp
              @endforeach
            </tbody>
          </table>

          
          @else
              <div class="empty">
                <p class="desc-dark">Belum Ada Data Siswa</p>
              </div>
          @endif        
        </div>
      </div>
    </section>

    <script>
      deleteBtn = document.querySelectorAll('.btn-delete');
      for (let i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].addEventListener('click', function(e) {
          e.preventDefault();
          document.querySelectorAll('.confirm-msg')[i].style.opacity = 1;
          document.querySelectorAll('.confirm-msg')[i].style.visibility = 'visible';

          document.querySelectorAll('.btn-close')[i].addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.confirm-msg')[i].style.opacity = 0;
            document.querySelectorAll('.confirm-msg')[i].style.visibility = 'hidden';
          })
        })    
      }
    </script>
@endsection
