<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

class PageService
{

    public function GetOnePage($pageID)
    {
        DB::connection('mysql');
        return $data = DB::select("SELECT * FROM Page WHERE PageId=? AND Competence='public'", [$pageID]);
    }

}
