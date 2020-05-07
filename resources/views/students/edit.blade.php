@extends('layouts.app')

@section('title')
    Edit Data Siswa
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/data-siswa/edit.css') }}">
@endsection

@section('content')
    <section class="section-edit">
      <div class="sidebar">
        <h1 class="heading-primary heading">Data Siswa</h1>
        <p class="desc">Membuat, menyunting dan menghapus data siswa</p>
      </div>
      <div class="main">
        <h1 class="title">Data Siswa</h1>
        <form action="{{ route('students.update', $student->id) }}" method="post" class="form-edit">
          @method('PUT')
          @csrf
          <div class="left">
            <div class="form-group">
              <label for="nama" class="label">Nama :</label>
              <input type="text" id="nama" name="nama" class="input-form" value="{{ $student->nama }}">
              @error('nama')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="nis" class="label">NIS :</label>
              <input type="text" id="nis" name="nis" class="input-form" value="{{ $student->nis }}">
              @error('nis')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="nisn" class="label">NISN :</label>
              <input type="text" id="nisn" name="nisn" class="input-form" value="{{ $student->nisn }}">
              @error('nisn')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="kelas" class="label">Kelas :</label>
              <input type="text" id="kelas" name="kelas" class="input-form" value="{{ $student->kelas }}">
              @error('kelas')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="ttl" class="label">Tempat, Tanggal Lahir :</label>
              <input type="text" id="ttl" name="ttl" class="input-form" value="{{ $student->ttl }}">
              @error('ttl')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label class="label">Jenis Kelamin :</label>
              <div class="radio">
                <div class="lk">
                  <input 
                    type="radio" 
                    id="lk" 
                    name="jenis_kelamin" 
                    value="laki-laki"
                    {{ strtolower($student->jen_kel) === 'laki-laki' ? 'checked': ''}}>
                  <label for="lk" class="label">Laki-Laki</label><br>
                </div>
                <div class="pr">
                  <input 
                    type="radio" 
                    id="pr" 
                    name="jenis_kelamin" 
                    value="perempuan"
                    {{ strtolower($student->jen_kel) === 'perempuan' ? 'checked': ''}}>
                  <label for="pr" class="label">Perempuan</label><br>
                </div>
              </div>
              @error('jenis_kelamin')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="center">
            <div class="form-group">
              <label for="agama" class="label">Agama</label>
              <select name="agama" id="agama" class="option">
                <option value="islam" 
                  {{ strtolower($student->agama) === 'islam' ? 'selected' : '' }}
                >Islam
                </option>

                <option 
                  value="katolik" 
                  {{ strtolower($student->agama) === 'katolik' ? 'selected' : '' }}
                >Katolik
                </option>

                <option 
                  value="kristen protestan" 
                  {{ strtolower($student->agama) === 'kristen protestan' ? 'selected' : '' }}
                >Kristen Protestan
                </option>

                <option 
                  value="hindu" 
                  {{ strtolower($student->agama) === 'hindu' ? 'selected' : '' }}
                >Hindu
                </option>

                <option 
                  value="buddha" 
                  {{ strtolower($student->agama) === 'buddha' ? 'selected' : '' }}
                >Buddha
                </option>

                <option 
                  value="kong hu cu" 
                  {{ strtolower($student->agama) === 'kong hu cu' ? 'selected' : '' }}
                >Kong Hu Cu
                </option>
              </select>
              @error('agama')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="pend_sebelum" class="label">Pendidikan Sebelum :</label>
              <input type="text" id="pend_sebelum" name="pend_sebelum" class="input-form" value="{{ $student->pend_sebelum }}">
              @error('pend_sebelum')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat" class="label">Alamat :</label>
              <input type="text" id="alamat" name="alamat" class="input-form" value="{{ $student->alamat }}">
              @error('alamat')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_ayah" class="label">Nama Ayah :</label>
              <input type="text" id="nama_ayah" name="nama_ayah" class="input-form" value="{{ $student->nama_ayah }}">
              @error('nama_ayah')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="pekerjaan_ayah" class="label">Pekerjaan Ayah :</label>
              <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="input-form" value="{{ $student->pekerjaan_ayah }}">
              @error('pekerjaan_ayah')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_ibu" class="label">Nama Ibu :</label>
              <input type="text" id="nama_ibu" name="nama_ibu" class="input-form" value="{{ $student->nama_ibu }}">
              @error('nama_ibu')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="right">
            <div class="form-group">
              <label for="pekerjaan_ibu" class="label">Pekerjaan Ibu :</label>
              <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="input-form" value="{{ $student->pekerjaan_ibu }}">
              @error('pekerjaan_ibu')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat_ortu" class="label">Alamat Orang Tua :</label>
              <input type="text" id="alamat_ortu" name="alamat_ortu" class="input-form" value="{{ $student->alamat_ortu }}">
              @error('alamat_ortu')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_wali" class="label">Nama Wali :</label>
              <input type="text" id="nama_wali" name="nama_wali" class="input-form" value="{{ $student->nama_wali }}">
              @error('nama_wali')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="pekerjaan_wali" class="label">Pekerjaan Wali :</label>
              <input type="text" id="pekerjaan_wali" name="pekerjaan_wali" class="input-form" value="{{ $student->pekerjaan_wali }}">
              @error('pekerjaan_wali')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat_wali" class="label">Alamat Wali :</label>
              <input type="text" id="alamat_wali" name="alamat_wali" class="input-form" value="{{ $student->alamat_wali }}">
              @error('alamat_wali')
                <p class="error-msg">{{ $message }}</p>
              @enderror
            </div>

            <button type="submit" class="btn-submit">Simpan</button>
          </div>
        </form>
      </div>
    </section>
@endsection