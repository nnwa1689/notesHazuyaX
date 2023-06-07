<?php

namespace App\Services;

use App\Models\User;
use App\Models\Blog;
use Carbon\Carbon;

class UserService
{

    public function GetUserData($userID)
    {
        $data = User::where('username', $userID) -> where('Position', 'on') -> get();
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
        $userData = $this -> GetUserData($username);
        if(!isset($userData[0]->username))
            return -1;
        elseif(password_verify($password, $userData[0]->pw))
        {
            session(['username' => $userData[0]->username]);
            //記錄使用者最後登入的ipAddress / Date
            $ipData = (isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '') . "/" . (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR']: '') . "/" . (isset($_SERVER['HTTP_X_FORWARDED']) ? $_SERVER['HTTP_X_FORWARDED'] : '') . "/" . (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) ? $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] : '') . "/" . (isset($_SERVER['HTTP_FORWARDED_FOR']) ? $_SERVER['HTTP_FORWARDED_FOR'] : '') . "/" . (isset($_SERVER['HTTP_FORWARDED']) ? $_SERVER['HTTP_FORWARDED'] : '') . "/" . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '') . "/" . (isset($_SERVER['HTTP_VIA']) ? $_SERVER['HTTP_VIA'] : '');
            $lastDate = Carbon::now()->setTimezone("Asia/Taipei")->toDateTimeString();
            User::where('username', $userData[0]->username) -> update(['LastDate' => $lastDate, 'LastIPdata' => $ipData]);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function GetActiveUser()
    {
        $data = User::where('Law_Post', '!=', 0) -> get();
        //$data = DB::select("SELECT * FROM admin WHERE Law_Post != ?", [0]);
        return $data;
    }

    public function GetAllUser()
    {
        $data = User::all() -> get();
        //$data = DB::select("select * from admin");
        return $data;
    }

    public function CreateUser($req)
    {
        $NewUserData = [
            'username' => $req->username, 
            'pw' => password_hash($req->pw,  PASSWORD_DEFAULT), 
            'Email' => $req->Email, 
            'Yourname' => $req->Yourname, 
            'IntroductionSelf' => '.',
            'Position' => 'on',
            'Law_WebInfo' => $req->Law_webInfo, 
            'Law_Files' => $req->Law_files, 
            'Law_Post' => $req->Law_post, 
            'Law_Category' => $req->Law_Category, 
            'Law_News' => $req->Law_News, 
            'Law_Users' => $req->Law_Account, 
            'Law_Page' => $req->Law_Page, 
            'Law_Nav' => $req->Law_Nav,
            'Law_Works' => $req->Law_Works
        ];

        if(count($this -> GetUserData($req->username)) <= 0)
        {
            $res = User::create($NewUserData);
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
        User::where('username', $username) -> update(
                [
                    'Law_WebInfo' => $req->Law_webInfo, 
                    'Law_Files' => $req->Law_files, 
                    'Law_Post' => $req->Law_post, 
                    'Law_Category' => $req->Law_Category, 
                    'Law_News' => $req->Law_News, 
                    'Law_Users' => $req->Law_Account, 
                    'Law_Page' => $req->Law_Page, 
                    'Law_Nav' => $req->Law_Nav,
                    'Law_Works' => $req->Law_Works
                ]
            );
        return 1;
    }

    public function DeleteUsers($req)
    {
        if(!empty($req->username))
        {
            $delAccount = $req->username;
            foreach($delAccount as $v)
            {
                //刪除使用者文章
                //DB::delete("delete from Blog where UserID=?", [$v]);
                Blog::where('UserID', $v) -> delete();
                User::where('username', '$v') -> delete();
                //DB::delete("delete from admin where username=?", [$v]);
            }
        }
    }

    public function UpdateUserData($req)
    {
        $userData = $this -> GetUserData(session('username'));

        if(password_verify($req -> oldPw, $userData[0]->pw))
        {
            if(!empty($req -> newPw))
            {
                if($req -> newPw == $req -> reNewPw)
                {
                    User::where('username', session('username')) -> update(
                        [
                            'pw' => password_hash($req -> newPw, PASSWORD_DEFAULT), 
                            'Email' => $req->Email, 
                            'Yourname' => $req->Yourname, 
                            'IntroductionSelf' => '',
                            'Url_Linked' => $req -> Url_Linked,
                            'Url_GitHub' => $req -> Url_GitHub,
                            'Avatar' => $req -> avatar,
                            'PersonBackground' => '',
                            'Signature' => $req -> Signature
                        ]
                    );
                }
                else
                {
                    return -1;
                }
            }
            else
            {
                User::where('username', session('username')) -> update(
                    [
                        'Email' => $req->Email, 
                        'Yourname' => $req->Yourname, 
                        'IntroductionSelf' => '',
                        'Url_Linked' => $req -> Url_Linked,
                        'Url_GitHub' => $req -> Url_GitHub,
                        'Avatar' => $req -> avatar,
                        'PersonBackground' => '',
                        'Signature' => $req -> Signature
                    ]
                );
            }
        }
        else
        {
            return 0;
        }
        return 1;
    }

}
