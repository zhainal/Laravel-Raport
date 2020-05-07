<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $table = 'extra';

    protected $fillable = ['nis', 'saran', 'ekskul', 'tinggi_sem1', 'tinggi_sem2', 'berat_sem1, berat_sem2', 'pendengaran', 'penglihatan', 'gigi', 'prestasi', 'jenis_prestasi', 'sakit', 'ijin', 'alfa'];

    public function student()
    {
        return $this->belongsTo('App\Student', 'nis', 'nis');
    }
}
