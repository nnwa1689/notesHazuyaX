<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;


class NavbarService
{

    public function GetTopNavBar()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Navigate WHERE type=? AND Competence=? ORDER BY Navigate.NavigateId",['0', 'public']);
        return $data;
    }

    public function GetButtonNav(){
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Navigate WHERE type=? AND Competence=? ORDER BY Navigate.NavigateId",['1', 'public']);
        return $data;
    }

}
