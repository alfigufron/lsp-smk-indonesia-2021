<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public $timestamps = false;

    protected $table = 'guru';
    
    protected $primaryKey = 'nip';

    protected $fillable = [
        'nip',
        'nama',
        'jk',
        'alamat',
        'password'
    ];
}
