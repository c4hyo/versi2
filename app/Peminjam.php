<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $fillable     = [
        'nama','username','password','no_hp','alamat'
    ];
    public $timestamps      = false;
}
