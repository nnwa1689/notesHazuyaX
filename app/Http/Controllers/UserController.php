<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{

    private $webData;

    public static function getUserData($userID){
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM admin WHERE username=? AND Position=?", [$userID, 'on']);
        return $data;
    }

    public static function getAllActionUserData(){
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM admin WHERE Law_Post != ?", [0]);
        return $data;
    }

    public function getUserPage($userID){
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        $userData = UserController::getUserData($userID);
        return view('person',['userData' => $userData, 'webData'=> $this->webData]);
    }

    public function getAllAuthorPage(){
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        $userData = UserController::getAllActionUserData();
        return view('author',['userData' => $userData, 'webData'=> $this->webData]);
    }

    public function getUserPagePost($userID, $pageNumber){
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        $userID = htmlspecialchars($userID);
        $userData = UserController::getUserData($userID);
        $userPostData = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName FROM Blog JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE (Competence='public') AND UserID='".$userID."' ORDER BY PostDate DESC) as Post"))->paginate(10);
        # $userPostData = DB::select("SELECT * FROM Blog WHERE (Blog.Competence=?) AND UserID=? ORDER BY Blog.PostDate DESC LIMIT ?, 10", ['public', 'protect',$userID, $start]);
        return view('personpost',['userData' => $userData, 'webData'=> $this->webData, 'allPosts'=> $userPostData]);
    }

    public function loginPage()
    {
        $this -> webData = WebController::webInit();
        if(UserController::checkLoginStatus()){
            return redirect('/admin');
        }else{
            return view('admin.login', ['webData'=> $this->webData, 'siteKey' => env('SITE_KEY', '')]);
        }
    }

    public function login(Request $request)
    {
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        include_once('ReCaptcha/src/autoload.php');
        // 語言 https://developers.google.com/recaptcha/docs/language
        $sitekey = env('SITE_KEY', '');
        $secret = env('SECRET', '');
        $lang = 'zh-TW';
        // 初始化變數為空值
        $resp = '';
        // 建立一個命名空間
        $recaptcha = new \ReCaptcha\ReCaptcha($secret,new \ReCaptcha\RequestMethod\CurlPost());
        // 將 recaptcha->verify 的值給 resp 變數
        $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        if ($resp->isSuccess() || (env('APP_ENV', 'production') == 'local') ){
            $userData = UserController::getUserData($request->username);
            if(!isset($userData[0]->username))
                return view('admin.login', ['webData'=> $this->webData, 'error'=>'使用者帳號不存在', 'siteKey' => env('SITE_KEY', '')]);
            elseif(password_verify($request->password, $userData[0]->pw)){
                session(['username' => $userData[0]->username]);
                //記錄使用者最後登入的ipAddress / Date
                $ipData = (isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '') . "/" . (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR']: '') . "/" . (isset($_SERVER['HTTP_X_FORWARDED']) ? $_SERVER['HTTP_X_FORWARDED'] : '') . "/" . (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) ? $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] : '') . "/" . (isset($_SERVER['HTTP_FORWARDED_FOR']) ? $_SERVER['HTTP_FORWARDED_FOR'] : '') . "/" . (isset($_SERVER['HTTP_FORWARDED']) ? $_SERVER['HTTP_FORWARDED'] : '') . "/" . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '') . "/" . (isset($_SERVER['HTTP_VIA']) ? $_SERVER['HTTP_VIA'] : '');
                $lastDate = Carbon::now()->setTimezone("Asia/Taipei")->toDateTimeString();
                DB::update("update admin set LastDate= ?, LastIPdata = ? where username = ?", [$lastDate, $ipData, $userData[0]->username]);
                return redirect('/admin');
            }else{
                return view('admin.login', ['webData'=> $this->webData, 'error'=> '密碼錯誤', 'siteKey' => env('SITE_KEY', '')]);
            }
        }else{
            return view('admin.login', ['webData'=> $this->webData, 'error'=> '請勾選我不是機器人！', 'lang'=>$lang, 'siteKey' => env('SITE_KEY', '')]);
        }
        return 0;
    }

    public static function checkLoginStatus()
    {
        # session check is had
        if(session('username')){
            if(!empty(UserController::getUserData(session('username')))){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }

    }

    public function logout()
    {
        # delete session
        session()->flush();
        return redirect('login');
    }
}
