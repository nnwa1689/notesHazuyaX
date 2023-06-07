<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorksStaff extends Model
{
    protected $table = 'WorksStaff';
    protected $primarykey = "PID";
    public $timestamps = false;
    protected $guarded = [];
}
