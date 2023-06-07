<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'Blog';
    protected $primarykey = "PostId";
    public $timestamps = false;
    protected $guarded = [];

    public function User()
    {
        return $this -> hasOne('App\User', 'username', 'UserID');
    }

    public function Category()
    {
        return $this -> hasOne('App\Category', 'ClassId', 'ClassId');
    }
}
