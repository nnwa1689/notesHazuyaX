<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

class WorksService
{

    /**
     * 拿到所有 Works
     *
     * @return workList
     */
    public function GetAllWorks()
    {
        DB::connection('mysql');
        $WorksList = DB::select(
            ('select * from Works order by OrderID asc'));
        return $WorksList;
    }

    /**
     * Works 詳細資料
     *
     * @return void
     */
    public function GetWorkDetail($WorksID)
    {
        DB::connection('mysql');
        $WorkDetail = DB::select(
            ('select Works.PID, Works.WorksID, Works.WorksName, Works.Intro, Works.CoverImage, Works.Customer, Works.Url, Works.ShortIntro, WorksStaff.PID as StaffPID, WorksStaff.StaffName, WorksStaff.StaffTitle, WorksStaff.StaffImage, WorksStaff.StaffUrl from Works right join WorksStaff on Works.PID = WorksStaff.WorksPID where Works.WorksID = ?'), [$WorksID]);
        return $WorkDetail;
    }

    /**
     * 拿到排序前兩個的 Works
     *
     * @return workList
     */
    public function GetTopTwoWorks()
    {
        DB::connection('mysql');
        $WorksList = DB::select(
            ('select * from Works order by OrderID asc limit 2'));
        return $WorksList;
    }
}
