<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataRw extends Model
{
    protected $table = 'rw';

    protected $fillable = [
        'nama',
        'rw',
        'periode_awal',
        'periode_akhir'
    ];
}
