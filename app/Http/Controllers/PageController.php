<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{

    private $webData;

    public function getPage($pageID)
    {
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Page WHERE PageId=? AND Competence='public'", [$pageID]);
        if(count($data) <= 0){
            abort(404);
            return;
        }
        return view('page',['data'=>$data, 'webData'=>$this->webData]);
    }
}
