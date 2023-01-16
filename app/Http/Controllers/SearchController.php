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
        $resultData = DB::table(DB::raw("(SELECT * FROM Blog LEFT JOIN admin ON Blog.UserID = admin.username WHERE (Blog.PostTittle LIKE ".$q." OR Blog.PostContant LIKE ".$q.") AND (Blog.Competence='public') ORDER BY Blog.PostId DESC) as search"))->paginate(10);
        return view('search', ['webData'=> $this->webData, 'data'=>$resultData, 'q'=>$q]);
        }

}
