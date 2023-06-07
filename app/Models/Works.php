<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $table = 'Works';
    protected $primarykey = "PID";
    public $timestamps = false;
    protected $guarded = [];

    public function WorksStaff()
    {
        return $this -> hasMany('App\WorksStaff', 'WorksPID', 'PID');
    }
}
