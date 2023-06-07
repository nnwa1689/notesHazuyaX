<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'Page';
    protected $primarykey = "PageId";
    public $timestamps = false;
    protected $guarded = [];
}
