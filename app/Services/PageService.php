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

    public function GetOnePageEdit($pageID)
    {
        DB::connection('mysql');
        return $pageData = DB::select("select * from Page where PageId=?", [$pageID]);
    }

    public function GetAllPages()
    {
        DB::connection('mysql');
        return DB::select("select * from Page");
    }

    public function InsertNewPage()
    {
        DB::connection('mysql');
        DB::insert("INSERT INTO Page (PageId, Competence, PageName, PageContant) VALUES (?, ?, ?, ?)", [$_POST['pageID'], $_POST['competance'], $_POST['pageTitle'], $_POST['cont']]);
        return 1;
    }

    public function UpdatePage($req, $pageID)
    {
        DB::connection('mysql');
        DB::update(
            "update Page set PageId=?, Competence=?, PageName=?, PageContant=? where PageId=?",
            [$req -> pageID, $req -> competance, $req -> pageTitle, $req -> cont, $pageID]);
        return 1;
    }

    public function DeletePages($req)
    {
        DB::connection('mysql');
        $delPage = $req -> pageID;
        foreach($delPage as $v)
        {
            DB::delete("delete from Page where PageId=?", [$v]);
        }
        return 1;
    }

}
