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
        $resultData = DB::select("SELECT * FROM Blog WHERE (PostTittle LIKE ? OR PostContant LIKE ?) AND (Competence=? OR Blog.Competence=?) ORDER BY PostId DESC", ['%'.$q->input()["search-text"].'%', '%'.$q->input()["search-text"].'%', 'public', 'protect']);
        return view('search', ['webData'=> $this->webData, 'data'=>$resultData]);
        }

}
