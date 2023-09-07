<?php

namespace App\Services;

use App\Models\Media;
use App\Services\NavbarService;
use App\Services\PostService;
use App\Services\UserService;

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
        $data = Media::orderBy('UploadDate', 'desc') -> paginate(12);
        return $data;
    }

    public function DeleteFiles($files)
    {
        if (count($files) > 0) {
            foreach ($files as $value) {
                try
                {
                    $fileinfo = Media::where('ID', $value) -> orderBy('UploadDate', 'desc') -> get();
                    //$fileinfo = DB::select("SELECT * FROM media WHERE ID=? ORDER BY media.UploadDate DESC", [$value]);
                    $delfile = $fileinfo[0]->URL;
                    if (is_file("/".$delfile))
                    {
                        //判斷檔案是否存在
                        //如果存在進行檔案刪除，否則直接刪除資料庫
                        $delfilenum = unlink("/" . $delfile);
                    }
                    else
                    {
                        $delfilenum=1;
                    }
                    Media::where('ID', $value) -> delete();
                }
                catch(Exception $e)
                {
                    return 0;
                }
            }
        }
        return 1;
    }

    public function UploadFile($filename, $filesize, $fileTmpname)
    {
        /* 暫時用 PHP 原生，之後再改 laravel */
        $filetype = array('jpeg', 'jpg', 'gif', 'png', 'PNG');
        $maxsize = 5097152;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uniName = md5(uniqid(microtime(true), true)) . "." . $ext;
        $des = "uploadfile/".$uniName;

        if (!in_array($ext, $filetype)) 
        {
            return 0;
        }

        if ($filesize > $maxsize) 
        {
            return 0;
        }
        
        if (!move_uploaded_file($fileTmpname, $des)) 
        {
            return 0;
        }

        $filename = $uniName;
        $fileURL = '/'.$des;
        date_default_timezone_set('Asia/Taipei');
        $fileUploadDate = date("Y-m-d");
        $filecap = $filesize;
        try
        {
            $NewFiles = [
                'Name' => $filename,
                'URL' => $fileURL,
                'UploadDate' => $fileUploadDate,
                'Type' => $ext,
                'Cap' =>$filecap
            ];
            Media::Create($NewFiles);
        }
        catch(Exception $e)
        {
            return 0;
        }
        return $fileURL;
    }

}
