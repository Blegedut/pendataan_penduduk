<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKk extends Model
{
    protected $table = 'kk';

    protected $fillable = [
        'kepala_keluarga',
        'no_kk',
        'image',
        'rt_id',
        'rw_id',
        'jumlah_individu'
    ];
}
