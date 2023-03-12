<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WorksController extends Controller
{

    private $webData;

    public function GetWorksDetailPage($WorksID)
    {
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        $WorkDetail = DB::select(
            ('select Works.PID, Works.WorksID, Works.WorksName, Works.Intro, Works.CoverImage, Works.Customer, Works.Url, Works.ShortIntro, WorksStaff.PID as StaffPID, WorksStaff.StaffName, WorksStaff.StaffTitle, WorksStaff.StaffImage, WorksStaff.StaffUrl from Works right join WorksStaff on Works.PID = WorksStaff.WorksPID where Works.WorksID = ?'), [$WorksID]);
        if(count($WorkDetail) <= 0){
            abort(404);
            return;
        }
        $title = $WorkDetail[0] -> WorksName." - ";
        return view('worksDetail',['WorkDetail'=>$WorkDetail, 'webData'=>$this->webData, 'title' => $title]);
    }

    public function GetAllWorksPage()
    {
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        $WorksList = DB::select(
            ('select * from Works order by OrderID asc'));
        if(count($WorksList) <= 0){
            abort(404);
            return;
        }
        $title = "作品一覽 - ";
        return view('worksList',['WorksList'=>$WorksList, 'webData'=>$this->webData, 'title' => $title]);
    }

    public static function GetTopTwoWorksList()
    {
        DB::connection('mysql');
        $WorksList = DB::select(
            ('select * from Works order by OrderID asc limit 2'));
        return $WorksList;
    }
}
