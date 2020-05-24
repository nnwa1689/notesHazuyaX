<?php
/*
導航控制器
麵包導航
頂部導航
底部導航
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NavController extends Controller
{
    public static function getNavBar()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Navigate WHERE type=? AND Competence=? ORDER BY Navigate.NavigateId",['0', 'public']);
        return $data;
    }

    public static function getButtonNav(){
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Navigate WHERE type=? AND Competence=? ORDER BY Navigate.NavigateId",['1', 'public']);
        return $data;
    }

}
