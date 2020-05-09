<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rapor</title>
</head>
<body>
  <style>
    * {
      font-size: 12px;
    }

    .center {
      text-align: center;
    }

    pre {
      font-family: inherit;
    }

    .title {
      text-align: center;
      font-size: 20px;
      text-transform: uppercase;
    }

    .subtitle {
      font-size: 12px;
    }

    table {
    border-collapse: collapse;
    }

    td {
        text-align: left;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        font-size: 0.8rem;
        color: #212529;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }

    .table .thead-dark th {
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-bordered {
        border: 1px solid #000;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #000;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }

    .saran-item {
      font-size: 28px;
      border: 1px solid #000;
      padding: 16px;
      text-align: center;
      font-weight: bold;
    }

    .absen-item {
      width: 300px;
      padding: 5px;
      border: border: 1px solid #000;
    }
  </style>
  <h1 class="title">Rapor Peserta Didik dan profil peserta didik</h1>
  <div class="identitas">
    <p class="identitas-item"><pre>Nama Peserta Didik  : {{strtoupper($student->nama)}}</pre></p>
    <p class="identitas-item"><pre>NIS                            : {{$student->nis}}</pre></p>
    <p class="identitas-item"><pre>NISN                         : {{$student->nisn}}</pre></p>
    <p class="identitas-item"><pre>Kelas                         : {{$student->kelas}}</pre></p>
  </div>

  <div class="sikap">
    <h2 class="subtitle">A. Sikap</h2>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th colspan="2">Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1. Sikap Spiritual</td>
          <td>{{ $student->sikap['sikap_spiritual'] }}</td>
        </tr>
        <tr>
          <td>2. Sikap Sosial</td>
          <td>{{ $student->sikap['sikap_sosial'] }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="nilai">
    <h2 class="subtitle">B. Pengetahuan dan Keterampilan</h2>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th rowspan="2">No.</th>
          <th rowspan="2">Muatan Pelajaran</th>
          <th colspan="2">Pengetahuan</th>
          <th colspan="2">Keterampilan</th>
        </tr>
        <tr>
          <th>Nilai</th>
          <th>Deskripsi</th>
          <th>Nilai</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Pendidikan Pancasila dan Kewarganegaraan</td>
          <td class="center">{{ $student->ppkn['nilai_pengetahuan'] }}</td>
          <td>{{ $student->ppkn['deskripsi_pengetahuan'] }}</td>
          <td class="center">{{ $student->ppkn['nilai_keterampilan'] }}</td>
          <td>{{ $student->ppkn['deskripsi_keterampilan'] }}</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Bahasa Indonesia</td>
          <td class="center">{{ $student->bahasa['nilai_pengetahuan'] }}</td>
          <td>{{ $student->bahasa['deskripsi_pengetahuan'] }}</td>
          <td class="center">{{ $student->bahasa['nilai_keterampilan'] }}</td>
          <td>{{ $student->bahasa['deskripsi_keterampilan'] }}</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Matematika</td>
          <td class="center">{{ $student->matematika['nilai_pengetahuan'] }}</td>
          <td>{{ $student->matematika['deskripsi_pengetahuan'] }}</td>
          <td class="center">{{ $student->matematika['nilai_keterampilan'] }}</td>
          <td>{{ $student->matematika['deskripsi_keterampilan'] }}</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Ilmu Pengetahuan Alam</td>
          <td class="center">{{ $student->IPA['nilai_pengetahuan'] }}</td>
          <td>{{ $student->IPA['deskripsi_pengetahuan'] }}</td>
          <td class="center">{{ $student->IPA['nilai_keterampilan'] }}</td>
          <td>{{ $student->IPA['deskripsi_keterampilan'] }}</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Ilmu Pengetahuan Sosial</td>
          <td class="center">{{ $student->IPS['nilai_pengetahuan'] }}</td>
          <td>{{ $student->IPS['deskripsi_pengetahuan'] }}</td>
          <td class="center">{{ $student->IPS['nilai_keterampilan'] }}</td>
          <td>{{ $student->IPS['deskripsi_keterampilan'] }}</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Seni Budaya dan Keterampilan</td>
          <td class="center">{{ $student->SBK['nilai_pengetahuan'] }}</td>
          <td>{{ $student->SBK['deskripsi_pengetahuan'] }}</td>
          <td class="center">{{ $student->SBK['nilai_keterampilan'] }}</td>
          <td>{{ $student->SBK['deskripsi_keterampilan'] }}</td>
        </tr>
        <tr>
          <td>7</td>
          <td>Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
          <td class="center">{{ $student->penjas['nilai_pengetahuan'] }}</td>
          <td>{{ $student->penjas['deskripsi_pengetahuan'] }}</td>
          <td class="center">{{ $student->penjas['nilai_keterampilan'] }}</td>
          <td>{{ $student->penjas['deskripsi_keterampilan'] }}</td>
        </tr>
        <tr>
          <td>8</td>
          <td>Muatan Lokal</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>a. PKLH</td>
          <td class="center">{{ $student->PKLH['nilai_pengetahuan'] }}</td>
          <td>{{ $student->PKLH['deskripsi_pengetahuan'] }}</td>
          <td class="center">{{ $student->PKLH['nilai_keterampilan'] }}</td>
          <td>{{ $student->PKLH['deskripsi_keterampilan'] }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="ekskul">
    <h2 class="subtitle">C. Ekstra Kurikuler</h2>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Kegiatan Ekstrakurikuler</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>{{ $student->extra['ekskul'] }}</td>
          <td>{{ $student->extra['ekskul'] ? 'Baik' : null }}</td>
        </tr>
        <tr>
          <td>2</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>3</td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="saran">
    <h2 class="subtitle">D. Saran</h2>
    <p class="saran-item">{{ $student->extra['saran'] }}</p>
  </div>

  <div class="badan">
    <h2 class="subtitle">E. Tinggi dan Berat Badan</h2>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Aspek Yang Dinilai</th>
          <th colspan="2">Semester</th>
        </tr>
        <tr>
          <th>1</th>
          <th>2</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Tinggi Badan</td>
          <td class="center">{{ $student->extra['tinggi_sem1'] }}</td>
          <td class="center">{{ $student->extra['tinggi_sem2'] }}</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Berat Badan</td>
          <td class="center">{{ $student->extra['berat_sem1'] }}</td>
          <td class="center">{{ $student->extra['berat_sem2'] }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="kesehatan">
    <h2 class="subtitle">F. Kondisi Kesehatan</h2>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Aspek Fisik</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Pendengaran</td>
          <td>{{ $student->extra['pendengaran'] }}</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Penglihatan</td>
          <td>{{ $student->extra['penglihatan'] }}</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Gigi</td>
          <td>{{ $student->extra['gigi'] }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="prestasi">
    <h2 class="subtitle">G. Prestasi</h2>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Jenis Prestasi</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>{{ $student->extra['jenis_prestasi'] ? $student->extra['jenis_prestasi'] : '-' }}</td>
          <td>{{ $student->extra['prestasi'] ? $student->extra['prestasi'] : '-' }}</td>
        </tr>
        <tr>
          <td>2</td>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr>
          <td>3</td>
          <td>-</td>
          <td>-</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="absen">
    <h2 class="subtitle">H. Ketidakhadiran</h2>
    <div class="absen-item">
      <p><pre>Sakit           : {{$student->extra['sakit']}} Hari</pre></p>
      <p><pre>Izin             : {{$student->extra['ijin']}} Hari</pre></p>
      <p><pre>Tanpa Ket.  : {{$student->extra['alfa']}} Hari</pre></p>
    </div>
  </div>
</body>
</html>