<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Services\UserService;
use App\Services\PostService;

class UserController extends Controller
{

    private $webData;
    protected $baseService;
    protected $userService;
    protected $postService;

    public function __construct(BaseService $baseService, UserService $userService, PostService $postService) 
    {
        $this -> baseService = $baseService;
        $this -> userService = $userService;
        $this -> postService = $postService;
    }

    public function getUserPage($userID){
        $this -> webData = $this -> baseService ->WebInit();
        $userData = $this -> userService -> GetUserData($userID);
        return view('person',['userData' => $userData, 'webData'=> $this->webData]);
    }

    public function getAllAuthorPage(){
        $this -> webData = $this -> baseService ->WebInit();
        $userData = $this -> userService -> GetActiveUser();
        return view('author',['userData' => $userData, 'webData'=> $this->webData]);
    }

    public function getUserPagePost($userID, $pageNumber){
        $this -> webData = $this -> baseService ->WebInit();
        $userID = htmlspecialchars($userID);
        $userData = $this -> userService -> GetUserData($userID);
        $userPostData = $this -> postService -> GetUserPosts($userID);
        return view('personpost',['userData' => $userData, 'webData'=> $this->webData, 'allPosts'=> $userPostData]);
    }

    public function loginPage()
    {
        $this -> webData = $this -> baseService ->WebInit();
        if($this -> userService -> CheckLoginStatus()){
            return redirect('/admin');
        }else{
            return view('admin.login', ['webData'=> $this->webData, 'siteKey' => env('SITE_KEY', '')]);
        }
    }

    public function login(Request $request)
    {
        $this -> webData = $this -> baseService ->WebInit();
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

        if ($resp->isSuccess() || (env('APP_ENV', 'production') == 'local') )
        {
            $loginResult = $this -> userService -> LoginByDatabase($request->username, $request->password);

            if($loginResult == -1 )
            {
                return view('admin.login', ['webData'=> $this->webData, 'error'=>'使用者帳號不存在', 'siteKey' => env('SITE_KEY', '')]);
            }
            else if($loginResult == 0)
            {
                return view('admin.login', ['webData'=> $this->webData, 'error'=> '密碼錯誤', 'siteKey' => env('SITE_KEY', '')]);
            }
            else if($loginResult == 1)
            {
                return redirect('/admin');
            }
            else
            {
                return view('admin.login', ['webData'=> $this->webData, 'error'=>'未知錯誤', 'siteKey' => env('SITE_KEY', '')]);
            }
        }
        else
        {
            return view('admin.login', ['webData'=> $this->webData, 'error'=> '請勾選我不是機器人！', 'lang'=>$lang, 'siteKey' => env('SITE_KEY', '')]);
        }
        return 0;
    }

    public function logout()
    {
        # delete session
        session()->flush();
        return redirect('login');
    }
}
