<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    public $timestamps = false;

    protected $table = 'mengajar';

    protected $fillable = [
        'id',
        'nip',
        'id_mapel',
        'id_kelas'
    ];
}
