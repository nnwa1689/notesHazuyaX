<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class SearchController extends Controller
{
    private $webData;

    public function searchPage()
    {
        $this -> webData = WebController::webInit();
        return view('search', ['webData'=> $this->webData]);
    }

    public function search(Request $q)
    {
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        $q = "'%".htmlspecialchars($q->input()["search-text"])."%'";
        $resultData = DB::table(DB::raw("(SELECT * FROM Blog WHERE (PostTittle LIKE ".$q." OR PostContant LIKE ".$q.") AND (Competence='public') ORDER BY PostId DESC) as search"))->paginate(10);
        return view('search', ['webData'=> $this->webData, 'data'=>$resultData, 'q'=>$q]);
        }

}
