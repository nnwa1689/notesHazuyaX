<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Services\PageService;
use App\Services\UserService;
use App\Services\PostService;
use App\Services\WorksService;

class PageController extends Controller
{

    private $webData;
    protected $baseService;
    protected $pageService;
    protected $userService;
    protected $postService;
    protected $worksService;

    public function __construct(
        BaseService $baseService, 
        PageService $pageService, 
        UserService $userService,
        PostService $postService,
        WorksService $worksService)
    {
        $this -> baseService = $baseService;
        $this -> pageService = $pageService;
        $this -> userService = $userService;
        $this -> postService = $postService;
        $this -> worksService = $worksService;
        
    }

    public function getPage($pageID)
    {
        $this -> webData = $this -> baseService ->WebInit();
        $data = $this -> pageService -> GetOnePage($pageID);
        if(count($data) <= 0)
        {
            abort(404);
            return;
        }
        return view('page',['data'=>$data, 'webData'=>$this->webData]);
    }

    public function GetErrorPage($statuCode)
    {
        $this -> webData = $this -> baseService ->WebInit();
        if($statuCode == "404")
        {
            return view('errors.' . '404', ['webData' => $this -> webData ]);
        }
        else
        {
            return view('errors.' . '500', ['webData' => $this -> webData ]);
        }
    }

    public function GetAboutPage()
    {
        $this -> webData = $this -> baseService ->WebInit();
        $userData = $this -> userService -> GetActiveUser();
        return view('about', ['userData' => $userData, 'webData' => $this -> webData ]);
    }

    public function GetContactPage()
    {
        $this -> webData = $this -> baseService ->WebInit();
        return view('contact', ['webData' => $this -> webData ]);
    }

    //取得首頁
    public function GetHomePage(){
        $this -> webData = $this -> baseService ->WebInit();
        $data = $this -> postService -> GetTopPublicPosts($this->webData['webConfig'][7]->tittle);
        $worksData = $this -> worksService -> GetTopNumberWorks(3);
        return view("index", ['webData' => $this->webData,'allPosts'=>$data, 'worksData' => $worksData, 'title'=>""]);
    }

}
