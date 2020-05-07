<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sikap extends Model
{
    protected $table = 'sikap';

    protected $fillable = [
        "nis", "sikap_spiritual", "sikap_sosial"
    ];

    public function student()
    {
        return $this->belongsTo('App\Student', 'nis', 'nis');
    }
}
