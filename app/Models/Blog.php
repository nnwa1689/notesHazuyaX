<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'Blog';
    protected $primarykey = "PostId";
    public $timestamps = false;
    protected $guarded = [];
}
