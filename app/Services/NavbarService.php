<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;
use App\Models\Navigate;


class NavbarService
{

    public function GetTopNavBar()
    {
        $data = Navigate::where('type', '0') -> where('Competence', 'public') -> orderBy('NavigateId', 'asc') -> get();
        //$data = DB::select("SELECT * FROM Navigate WHERE type=? AND Competence=? ORDER BY Navigate.NavigateId",['0', 'public']);
        return $data;
    }

    public function GetButtonNav()
    {
        $data = Navigate::where('type', '1') -> where('Competence', 'public') -> orderBy('NavigateId', 'asc') -> get();
        //$data = DB::select("SELECT * FROM Navigate WHERE type=? AND Competence=? ORDER BY Navigate.NavigateId",['1', 'public']);
        return $data;
    }

    public function GetAllTopNavbarEdit()
    {        
        return Navigate::where('type', '0') -> get(); 
    }

    public function GetAllBtnNavbarEdit()
    {
        return Navigate::where('type', '1') -> get(); 
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
                    Navigate::where('IndexId', $value) -> update(
                        [
                            'NavigateId' => $checkedOrder[$value], 
                            'NavigateName' => $checkedNavName[$value], 
                            'URL' => $checkedURL[$value], 
                            'Competence' => $checkedCompetence[$value], 
                            'type' => $typeId
                        ]
                    );
                    //DB::update("UPDATE Navigate SET NavigateId = ?, NavigateName = ?, URL = ?, Competence = ?, type = ? WHERE IndexId = ?", [$checkedOrder[$value], $checkedNavName[$value], $checkedURL[$value], $checkedCompetence[$value], $typeId, $value]);
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
        foreach($navbarItems as $value)
        {
            Navigate::where('IndexId', $value) -> delete();
        }
        return 1;
    }

    public function InsertNavbar($req, $typeId)
    {
        if(!empty($req -> newName) && !empty($req -> newOrder))
        {
            $NewNavItem = [
                'NavigateId' => $req -> newOrder, 
                'NavigateName' => $req -> newName, 
                'URL' => $req -> newURL, 
                'Competence' => $req -> newCompetence, 
                'type' => $typeId
            ];

            Navigate::create($NewNavItem);
            //DB::insert("INSERT INTO Navigate (NavigateId,NavigateName,URL,Competence,type) VALUES ( ?, ?, ?, ?, ? )",[$req -> newOrder, $req -> newName, $req -> newURL, $req -> newCompetence, $typeId]);
        }
        return 1;
    }

}
