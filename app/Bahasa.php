<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    protected $table = 'bahasa';

    protected $fillable = [
        "nis", "nilai_pengetahuan", "deskripsi_pengetahuan", "nilai_keterampilan", "deskripsi_keterampilan"
    ];

    public function student()
    {
        return $this->belongsTo('App\Student', 'nis', 'nis');
    }
}
