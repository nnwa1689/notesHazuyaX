<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;
use App\Services\UserService;
use App\Services\PostService;
use App\Services\NavbarService;


class FileService
{

    protected $postService;
    protected $navbarService;
    protected $userService;

    public function __construct(PostService $postService, NavbarService $navbarService, UserService $userService)
    {
        $this -> postService = $postService;
        $this -> navbarService = $navbarService;
        $this -> userService = $userService;
    }

    public function GetFiles()
    {
        DB::connection('mysql');
        $data = DB::table(DB::raw("(SELECT * FROM media) as files ORDER BY files.UploadDate DESC")) -> paginate(12);;
        return $data;
    }

    public function DeleteFiles($files)
    {
        if (count($files) > 0) {
            foreach ($files as $value) {
                try
                {
                    $fileinfo = DB::select("SELECT * FROM media WHERE ID=? ORDER BY media.UploadDate DESC", [$value]);
                    $delfile = $fileinfo[0]->URL;
                    if (is_file("/".$delfile))
                    {//判斷檔案是否存在
                        //如果存在進行檔案刪除，否則直接刪除資料庫
                        $delfilenum = unlink("/" . $delfile);
                    }
                    else
                    {
                        $delfilenum=1;
                    }
                    DB::delete('DELETE FROM media WHERE ID=?', [$value]);
                }
                catch(Exception $e)
                {
                    return 0;
                }
            }
        }
        return 1;
    }

    public function UploadFile($fileinfo)
    {
        /* 暫時用 PHP 原生，之後再改 laravel */
        DB::connection('mysql');
        $filetype = array('jpeg', 'jpg', 'gif', 'png', 'PNG');
        $maxsize = 5097152;
        $ext = pathinfo($fileinfo['name'], PATHINFO_EXTENSION);
        $uniName = md5(uniqid(microtime(true), true)) . "." . $ext;
        $des = "uploadfile/".$uniName;

        if (!in_array($ext, $filetype)) {
            //print("非法副檔名");
            return 0;
        }

        if ($fileinfo['size'] > $maxsize) {
            //print("檔案超過大小限制!");
            return 0;
        }
        if (!move_uploaded_file($fileinfo['tmp_name'], $des)) {
            //print("檔案從暫存區移動至資料夾失敗");
            return 0;
        }

        $filename = $uniName;
        $fileURL = '/'.$des;
        date_default_timezone_set('Asia/Taipei');
        $fileUploadDate = date("Y-m-d");
        $filecap = $fileinfo['size'];
        try
        {
            DB::insert("INSERT INTO media (Name,URL,UploadDate,Type,Cap) VALUES (?, ?, ?, ?, ?)",  [$filename,$fileURL,$fileUploadDate,$ext,$filecap]);
        }
        catch(Exception $e)
        {
            return 0;
        }
        return $fileURL;
    }

}
