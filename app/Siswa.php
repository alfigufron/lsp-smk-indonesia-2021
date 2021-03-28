<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $timestamps = false;

    protected $table = 'siswa';
    
    protected $primaryKey = 'nis';

    protected $fillable = [
        'nis',
        'nama',
        'jk',
        'alamat',
        'password',
        'id_kelas'
    ];
}
