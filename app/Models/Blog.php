<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'Blog';
    protected $primarykey = "PostId";
    public $timestamps = false;
    protected $guarded = [];

    //由於User 已被表使用，重複名稱會有問題，此處改用 Author
    public function Author()
    {
        return $this -> hasOne('App\Models\User', 'username', 'UserID');
    }

    public function Category()
    {
        return $this -> hasOne('App\Models\Category', 'ClassId', 'ClassId');
    }
}
