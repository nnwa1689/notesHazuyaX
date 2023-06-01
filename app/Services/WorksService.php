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
     * Works 詳細資料(依照PID)
     *
     * @return void
     */
    public function GetWorkDetailByPID($WorksPID)
    {
        DB::connection('mysql');
        $WorkDetail = DB::select(
            ('select Works.PID, Works.OrderID, Works.WorksID, Works.WorksName, Works.ShortIntro, Works.Intro, Works.CoverImage, Works.Customer, Works.Url, WorksStaff.PID as StaffPID, WorksStaff.StaffName, WorksStaff.StaffTitle, WorksStaff.StaffImage, WorksStaff.StaffUrl from Works right join WorksStaff on Works.PID = WorksStaff.WorksPID where Works.PID = ?'), [$WorksPID]);
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

    /**
     * 插入新的 WORKS
     *
     * @return
     */
    public function InsertWork($req)
    {
        DB::connection('mysql');
        DB::transaction(function() use ($req)
        {
            /**找出下一筆的自動遞增PK */
            $NextPID = DB::select("SHOW TABLE STATUS LIKE 'Works'")[0] -> Auto_increment;
            DB::insert(
                "INSERT INTO Works (WorksID, WorksName, Customer, Intro, CoverImage, Url, OrderID, ShortIntro) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
                  [
                    $req -> WorksID,
                    $req -> WorksName,
                    $req -> Customer,
                    $req -> Intro,
                    $req -> CoverImage,
                    $req -> Url,
                    $req -> OrderID,
                    $req -> ShortIntro
                  ]
            );
            for ($i = 1; $i < 6; $i++)
            {
                $name = 'staff'.$i.'_name';
                $title = 'staff'.$i.'_title';
                $image = 'staff'.$i.'_Image';
                $url = 'staff'.$i.'_Url';
                DB::insert(
                    "INSERT INTO WorksStaff (WorksPID, StaffName, StaffTitle, StaffImage, StaffUrl) VALUE (?, ?, ?, ?, ?)",
                    [
                        $NextPID,
                        $req -> $name,
                        $req -> $title,
                        $req -> $image,
                        $req -> $url
                    ]
                );
            }
        });
        return 1;
    }

    /**
     * 更新 WORKS
     *
     * @return
     */
    public function UpdateWork($req, $WorksPID)
    {
        DB::connection('mysql');
        DB::transaction(function() use ($req, $WorksPID)
        {
            DB::update(
                "update Works set WorksID = ?, WorksName = ?, Customer = ?, Intro = ?, CoverImage = ?, Url = ?, OrderID = ?, ShortIntro = ? where Works.PID = ?",
                  [
                    $req -> WorksID,
                    $req -> WorksName,
                    $req -> Customer,
                    $req -> Intro,
                    $req -> CoverImage,
                    $req -> Url,
                    $req -> OrderID,
                    $req -> ShortIntro,
                    $WorksPID
                  ]
                );
            for ($i = 1; $i < 6; $i++){
                $name = 'staff'.$i.'_name';
                $title = 'staff'.$i.'_title';
                $image = 'staff'.$i.'_Image';
                $url = 'staff'.$i.'_Url';
                $PID = 'staff'.$i.'_StaffPID';
                DB::update(
                    "update WorksStaff set StaffName = ?, StaffTitle = ?, StaffImage = ?, StaffUrl = ? where PID = ?",
                [
                    $req -> $name,
                    $req -> $title,
                    $req -> $image,
                    $req -> $url,
                    $req -> $PID
                ]
            );
            }
        });
        return 1;
    }

    /**
     * 刪除 WORKS
     *
     * @return
     */
    public function DeleteWork($req)
    {
        DB::connection('mysql');
        $delWorksPID = (isset($req -> WorksID) ? $req -> WorksID : '');

        if($delWorksPID !== '')
        {
            foreach($delWorksPID as $value)
            {
                DB::transaction(function() use ($value)
                {
                    DB::delete("DELETE FROM Works WHERE PID = ?", [$value]);
                    DB::delete("DELETE FROM WorksStaff WHERE WorksPID = ?", [$value]);
                });
            }
        }
        return 1;
    }

}