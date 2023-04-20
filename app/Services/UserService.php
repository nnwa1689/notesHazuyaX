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

}
