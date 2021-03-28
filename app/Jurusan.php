<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public $timestamps = false;

    protected $table = 'jurusan';

    protected $fillable = ['nama'];
}
