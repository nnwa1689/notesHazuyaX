<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $table = 'web';
    protected $primarykey = "ID";
    public $timestamps = false;
    protected $guarded = [];
}
