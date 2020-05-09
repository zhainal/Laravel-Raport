<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        "nama", "nis", "nisn", "kelas", "ttl", "jen_kel", "agama", "pend_sebelum", "alamat", "nama_ayah", "nama_ibu", "pekerjaan_ayah", "pekerjaan_ibu", "alamat_ortu", "nama_wali", "pekerjaan_wali", "alamat_wali"
    ];

    public function ppkn()
    {
        return $this->hasOne('App\Ppkn', 'nis', 'nis');
    }

    public function bahasa()
    {
        return $this->hasOne('App\Bahasa', 'nis', 'nis');
    }

    public function sikap()
    {
        return $this->hasOne('App\Sikap', 'nis', 'nis');
    }

    public function extra()
    {
        return $this->hasOne('App\Extra', 'nis', 'nis');
    }
}
