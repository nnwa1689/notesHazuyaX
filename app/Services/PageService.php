<?php

namespace App\Services;

use App\Models\Page;

class PageService
{

    public function GetOnePage($pageID)
    {
        return Page::where('PageId', $pageID) -> where('Competence', 'public') -> get();
    }

    public function GetOnePageEdit($pageID)
    {
        return Page::where('PageId', $pageID) -> get();
    }

    public function GetAllPages()
    {
        return Page::all();
    }

    public function InsertNewPage($req)
    {
        $NewPage = [
            'PageId' => $req -> pageID,
            'Competence' => $req -> competance,
            'PageName' => $req -> pageTitle,
            'PageContant' => $req -> cont 
        ];
        Page::create($NewPage);
        return 1;
    }

    public function UpdatePage($req, $pageID)
    {
        Page::where('PageId', $pageID) -> update(
            [
                'Competence' => $req -> competance,
                'PageName' => $req -> pageTitle,
                'PageContant' => $req -> cont,
                'PageId' => $req -> pageID
            ]
        );
        return 1;
    }

    public function DeletePages($req)
    {
        $delPage = $req -> pageID;
        foreach($delPage as $v)
        {
            Page::where('pageId', $v) -> delete();
        }
        return 1;
    }

}
