<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $table        = 'postings';
    public $timestamps      = false;
    protected $guarded     =   [
        'id'
    ];
}
