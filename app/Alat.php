<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    public $timestamps      = false;
    protected $guarded      =   [
        'id'
    ];
}
