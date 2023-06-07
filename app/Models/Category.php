<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'BClasses';
    protected $primarykey = "ClassId";
    public $timestamps = false;
    protected $guarded = [];
}
