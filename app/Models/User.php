<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{    
    protected $table = 'admin';
    protected $primarykey = "username";
    public $timestamps = false;
    protected $guarded = [];
}
