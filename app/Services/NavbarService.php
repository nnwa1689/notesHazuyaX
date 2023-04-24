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

    public function GetButtonNav()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Navigate WHERE type=? AND Competence=? ORDER BY Navigate.NavigateId",['1', 'public']);
        return $data;
    }

    public function GetAllTopNavbarEdit()
    {
        DB::connection('mysql');
        return DB::select("select * from Navigate where type=0");
    }

    public function GetAllBtnNavbarEdit()
    {
        DB::connection('mysql');
        return DB::select("select * from Navigate where type=1");
    }

    /* 
        問題:這裡因為刪除與更新行為被綁在同一個路由，為了縮減 controller 暫時由 update service 呼叫 delete 行為 
    */
    public function UpdateNavbars($req, $typeId)
    {
        DB::connection('mysql');
        if($req -> action=='new')
        {
            $this -> InsertNavbar($req, $typeId);
        }
        else if($req -> action=='update' || $req -> action=='delete')
        {
            $checkedItem = $req -> navid;
            $checkedNavName = $req -> NavName;
            $checkedOrder = $req -> order;
            $checkedURL = $req -> URL;
            $checkedCompetence = $req -> Competence;

            if(!isset($checkedItem))
            {
                return 1;

            }
            else if($req -> action=='update')
            {
                foreach($checkedItem as $value)
                {
                    DB::update("UPDATE Navigate SET NavigateId = ?, NavigateName = ?, URL = ?, Competence = ?, type = ? WHERE IndexId = ?", [$checkedOrder[$value], $checkedNavName[$value], $checkedURL[$value], $checkedCompetence[$value], $typeId, $value]);
                }

            }
            else if($req -> action=='delete')
            {
                $this -> DeleteNavbars($checkedItem);
            }
        }
        return 1;     
    }

    public function DeleteNavbars($navbarItems)
    {
        DB::connection('mysql');
        foreach($navbarItems as $value)
        {
            DB::delete("DELETE FROM Navigate WHERE IndexId = ?", [$value]);
        }
        return 1;
    }

    public function InsertNavbar($req, $typeId)
    {
        if(!empty($req -> newName) && !empty($req -> newOrder))
        {
            DB::insert("INSERT INTO Navigate (NavigateId,NavigateName,URL,Competence,type) VALUES ( ?, ?, ?, ?, ? )",[$req -> newOrder, $req -> newName, $req -> newURL, $req -> newCompetence, $typeId]);
        }
        return 1;
    }

}
