<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'nama', 'npsn', 'alamat', 'kode_pos', 'no_telp', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'email', 'website', 'kepsek', 'nip_kepsek'
    ];
}
