<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    public $timestamps = false;

    protected $table = 'nilai';

    protected $fillable = [
        'uh',
        'uts',
        'uas',
        'na',
        'id_mengajar',
        'nis'
    ];
}
