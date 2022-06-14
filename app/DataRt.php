<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataRt extends Model
{
    protected $table = 'rt';

    protected $fillable = [
        'nama',
        'rt',
        'rw_id',
        'periode_awal',
        'periode_akhir'
    ];
}
