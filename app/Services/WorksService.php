<?php

namespace App\Services;

use App\Models\Works;
use App\Models\WorksStaff;
use DB;

class WorksService
{
    /**
     * 拿到所有 Works
     *
     * @return WorksList
     */
    public function GetAllWorks()
    {
        $WorksList = Works::orderBy('OrderID', 'asc') -> get();
        return $WorksList;
    }

    /**
     * 拿到所有公開 Works
     *
     * @return WorksList
     */
    public function GetAllWorksPublic()
    {
        $WorksList = Works::where('OrderID', '>', 0) -> orderBy('OrderID', 'asc') -> get();
        return $WorksList;
    }


    /**
     * Works 詳細資料
     *
     * @return $WorkDetail
     */
    public function GetWorkDetail($WorksID)
    {
        $WorkDetail = Works::where('WorksID', $WorksID) -> get();
        return $WorkDetail;
    }

    /**
     * Works 詳細資料
     *
     * @return $WorkDetail
     */
    public function GetWorkDetailPublic($WorksID)
    {
        $WorkDetail = Works::where('WorksID', $WorksID) -> where('OrderID', '>', 0) -> get();
        return $WorkDetail;
    }

    /**
     * Works 詳細資料(依照PID)
     *
     * @return void
     */
    public function GetWorkDetailByPID($WorksPID)
    {
        $WorkDetail = Works::where('PID', $WorksPID) -> get();
        return $WorkDetail;
    }

    /**
     * 拿到排序前兩個的 Works
     *
     * @return workList
     */
    public function GetTopNumberWorks($num)
    {
        $WorksList = Works::where('OrderID', '>', 0) -> orderBy('OrderID', 'asc') -> limit($num) -> get();
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
            $NewWorks = [
                'WorksID' => $req -> WorksID,
                'WorksName' => $req -> WorksName,
                'Customer' => $req -> Customer,
                'Intro' => $req -> Intro,
                'CoverImage' => $req -> CoverImage,
                'Url' => $req -> Url,
                'OrderID' => $req -> OrderID,
                'ShortIntro' => $req -> ShortIntro
            ];

            /**找出下一筆的自動遞增PK */
            $NextPID = DB::select("SHOW TABLE STATUS LIKE 'Works'")[0] -> Auto_increment;

            Works::create($NewWorks);

            for ($i = 1; $i < 6; $i++)
            {
                $name = 'staff'.$i.'_name';
                $title = 'staff'.$i.'_title';
                $image = 'staff'.$i.'_Image';
                $url = 'staff'.$i.'_Url';

                WorksStaff::create(
                    [
                        'WorksPID' => $NextPID,
                        'StaffName' => $req -> $name,
                        'StaffTitle' => $req -> $title,
                        'StaffImage' => $req -> $image,
                        'StaffUrl' => $req -> $url
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
            Works::where('PID', $WorksPID) -> update(
                [
                    'WorksID' => $req -> WorksID,
                    'WorksName' => $req -> WorksName,
                    'Customer' => $req -> Customer,
                    'Intro' => $req -> Intro,
                    'CoverImage' => $req -> CoverImage,
                    'Url' => $req -> Url,
                    'OrderID' => $req -> OrderID,
                    'ShortIntro' => $req -> ShortIntro
                ]
            );

            for ($i = 1; $i < 6; $i++){
                $name = 'staff'.$i.'_name';
                $title = 'staff'.$i.'_title';
                $image = 'staff'.$i.'_Image';
                $url = 'staff'.$i.'_Url';
                $PID = 'staff'.$i.'_StaffPID';

                WorksStaff::where('PID', $req -> $PID) -> update(
                    [
                        'StaffName' => $req -> $name,
                        'StaffTitle' => $req -> $title,
                        'StaffImage' => $req -> $image,
                        'StaffUrl' => $req -> $url
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
                    Works::where('PID', $value) -> delete();
                    WorksStaff::where('WorksPID', $value) -> delete();
                });
            }
        }
        return 1;
    }
}
