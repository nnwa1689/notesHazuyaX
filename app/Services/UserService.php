<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class UserService
{

    public function GetUserData($userID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM admin WHERE username=? AND Position=?", [$userID, 'on']);
        return $data;
    }

    public function CheckLoginStatus()
    {
        # session check is had
        if(session('username')){
            if(!empty($this ->  GetUserData(session('username'))))
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    public function LoginByDatabase($username, $password)
    {
        DB::connection('mysql');
        $userData = $this -> GetUserData($username);
        if(!isset($userData[0]->username))
            return -1;
        elseif(password_verify($password, $userData[0]->pw))
        {
            session(['username' => $userData[0]->username]);
            //記錄使用者最後登入的ipAddress / Date
            $ipData = (isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '') . "/" . (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR']: '') . "/" . (isset($_SERVER['HTTP_X_FORWARDED']) ? $_SERVER['HTTP_X_FORWARDED'] : '') . "/" . (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) ? $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] : '') . "/" . (isset($_SERVER['HTTP_FORWARDED_FOR']) ? $_SERVER['HTTP_FORWARDED_FOR'] : '') . "/" . (isset($_SERVER['HTTP_FORWARDED']) ? $_SERVER['HTTP_FORWARDED'] : '') . "/" . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '') . "/" . (isset($_SERVER['HTTP_VIA']) ? $_SERVER['HTTP_VIA'] : '');
            $lastDate = Carbon::now()->setTimezone("Asia/Taipei")->toDateTimeString();
            DB::update("update admin set LastDate= ?, LastIPdata = ? where username = ?", [$lastDate, $ipData, $userData[0]->username]);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function GetActiveUser()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM admin WHERE Law_Post != ?", [0]);
        return $data;
    }

    public function GetAllUser()
    {
        DB::connection('mysql');
        $data = DB::select("select * from admin");
        return $data;
    }

    public function CreateUser($req)
    {
        DB::connection('mysql');
        if(count($this -> GetUserData($req->username)) <= 0)
        {
            $res = DB::insert
            (
                "INSERT INTO admin (username, pw, Email, Yourname, IntroductionSelf, Position, Law_WebInfo, Law_Files, Law_Post, Law_Category, Law_News, Law_Users, Law_Page, Law_Nav, Law_Works) VALUES (?, ?, ?, ?, '這個人太懶了，還沒有新增自介！', 'on', ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
                [
                    $req->username, 
                    password_hash($req->pw,  PASSWORD_DEFAULT), 
                    $req->Email, 
                    $req->Yourname, 
                    $req->Law_webInfo, 
                    $req->Law_files, 
                    $req->Law_post, 
                    $req->Law_Category, 
                    $req->Law_News, 
                    $req->Law_Account, 
                    $req->Law_Page, 
                    $req->Law_Nav,
                    $req->Law_Works
                ]
            );
            return $res;
        }
        else
        {            
            $res = 0;
            return $res;
        }
    }

    /**
     * 更新使用者權限，另有更新使用者資料的函數，這裡命名不太好
     */
    public function UpdateUser($req, $username)
    {
        DB::connection('mysql');
        DB::update
        (
            "update admin set Law_WebInfo = ?, Law_Files = ?, Law_Post = ?, Law_Category = ?, Law_News = ?, Law_Users = ?, Law_Page = ?, Law_Nav = ?, Law_Works = ? where username = ?", 
            [
                $req->Law_webInfo, 
                $req->Law_files, 
                $req->Law_post, 
                $req->Law_Category, 
                $req->Law_News, 
                $req->Law_Account, 
                $req->Law_Page, 
                $req->Law_Nav, 
                $req->Law_Works,
                $username
        ]);
        return 1;
    }

    public function DeleteUsers($req)
    {
        DB::connection('mysql');
        if(!empty($req->username))
        {
            $delAccount = $req->username;
            foreach($delAccount as $v)
            {
                //刪除使用者文章
                DB::delete("delete from Blog where UserID=?", [$v]);
                DB::delete("delete from admin where username=?", [$v]);
            }
        }
    }

    public function UpdateUserData($req)
    {
        DB::connection('mysql');
        $userData = $this -> GetUserData(session('username'));

        if(password_verify($req -> oldPw, $userData[0]->pw))
        {
            if(!empty($req -> newPw))
            {
                if($req -> newPw == $req -> reNewPw)
                {
                    DB::update('update admin set pw=?, Email=?, Url_Linked = ?, Url_GitHub = ?, Yourname=?, Avatar=?, IntroductionSelf=?,PersonBackground=?, Signature=? where username=?', [ password_hash($req -> newPw, PASSWORD_DEFAULT), $req -> Email, $req -> Url_Linked, $req -> Url_GitHub, $req -> Yourname, $req -> avatar, $req -> IntroductionSelf, $req -> PersonBackground, $req -> Signature, session('username') ]);
                }
                else
                {
                    return -1;
                }
            }
            else
            {
                DB::update('update admin set Email=?, Url_Linked = ?, Url_GitHub = ?, Yourname=?, Avatar=?, IntroductionSelf=?,PersonBackground=?, Signature=? where username=?', [ $req -> Email, $req -> Url_Linked, $req -> Url_GitHub, $req -> Yourname, $req -> avatar, $req -> IntroductionSelf, $req -> PersonBackground, $req -> Signature, session('username') ]);
            }

        }
        else
        {
            return 0;
        }
        return 1;
    }

}
