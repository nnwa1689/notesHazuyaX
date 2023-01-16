<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
/**************************
 * getWebConfig
 * ->操作變數:mate為一陣列，內容依ID排列
 * 0:網站標題
 * 1:網站關鍵字
 * 2:網站簡介
 * 3:底部訊息
 * 4:頭部代碼
 * 5:LOGO圖片位址
 * 6:公告頁每頁數量
 * 7:文章頁面每頁顯示數量
 * 8:首頁公告列表顯示數量
 * 9:首頁是否顯示公告
 * 10:是否顯示TOP按鈕
 * 11:TOP按鈕圖片位址
 * 12:是否開放使用者註冊此網站
 * 13:網站網址
 * 14:是否在註冊頁面顯示網站使用者條款
 * 15:網站使用者條款內容
 * 16:使用者註冊之預設權限
 * 17:網站是否開放
 * 18:關閉的理由
 ***************************/

 /*
 *
 * webInit()
 * 呼叫網頁共同資料
 * 側邊欄
 * 頭部與底部導航
 * WebConfig
 *
 */
class WebController extends Controller
{
    public static function getWebConfig()
    {
       DB::connection('mysql');
       $data = DB::select("SELECT * FROM web ORDER BY ID ASC");
       return $data;
    }

    public static function webInit(){

        if(UserController::checkLoginStatus()){

            $userData = UserController::getUserData(session('username'));

        }else{

            $userData = 0;

        }

        $categoryData = PostController::getallCategory();
        $NavData = NavController::getNavBar();
        $WebData = WebController::getWebConfig();
        $buttonNavData = NavController::getButtonNav();
        $homePostdata = WhatNewsController::getFiveHomePost();


        return ['allCategory'=> $categoryData, 'allNav'=> $NavData, 'webConfig' => $WebData, 'allButtonNav' => $buttonNavData, 'homePost' => $homePostdata, 'userData'=>$userData];
    }
}
