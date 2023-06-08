<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigate extends Model
{    
    protected $table = 'Navigate';
    protected $primarykey = "IndexId ";
    public $timestamps = false;
    protected $guarded = [];
}
