<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $timestamps = false;

    protected $table = 'kelas';

    protected $fillable = [
        'nama',
        'id_jurusan'
    ];
}
