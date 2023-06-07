<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;
use App\Services\UserService;
use App\Services\PostService;
use App\Services\NavbarService;
use App\Models\Web;


class BaseService
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

    public function GetWebConfig()
    {
        DB::connection('mysql');
        $data = Web::orderBy('ID', 'asc') -> get();
        //$data = DB::select("SELECT * FROM web ORDER BY ID ASC");
        return $data;
    }

    public function WebInit(){

        if($this -> userService -> CheckLoginStatus()){
            $userData = $this -> userService -> GetUserData(session('username'));
        }else{
            $userData = 0;
        }

        $categoryData = $this -> postService -> GetAllPublicCategory();
        $NavData = $this -> navbarService -> GetTopNavBar();
        $WebData = $this -> GetWebConfig();
        $buttonNavData = $this -> navbarService -> GetButtonNav();
        //$homePostdata = WhatNewsController::getFiveHomePost();
        return ['allCategory'=> $categoryData, 'allNav'=> $NavData, 'webConfig' => $WebData, 'allButtonNav' => $buttonNavData, 'userData'=>$userData];
    }

    public function UpdateWebConfig($req)
    {
        DB::connection('mysql');
        try
        {
            DB::update('update web set tittle = ? where ID = 0', [$req->webName]);
            DB::update('update web set tittle = ? where ID = 13', [$req-> URL]);
            DB::update('update web set tittle = ? where ID = 5', [$req->Logo]);
            DB::update('update web set tittle = ? where ID = 1', [$req->keyWords]);
            DB::update('update web set tittle = ? where ID = 2', [$req->descripition]);
            DB::update('update web set tittle = ? where ID = 4', [$req->header]);
            DB::update('update web set tittle = ? where ID = 3', [$req->footer]);
            DB::update('update web set tittle = ? where ID = 7', [$req->HomePostNum]);
            DB::update('update web set tittle = ? where ID = 20', [$req->FB]);
            DB::update('update web set tittle = ? where ID = 21', [$req->IG]);
            DB::update('update web set tittle = ? where ID = 22', [$req->TWITTER]);
            DB::update('update web set tittle = ? where ID = 23', [$req->APPLEPODCAST]);
            DB::update('update web set tittle = ? where ID = 24', [$req->GOOGLEPODCAST]);
            //DB::update('update web set tittle = ? where ID = 25', [$req->HomeAds1Url]);
            //DB::update('update web set tittle = ? where ID = 26', [$req->Home1AdsImg]);
            //DB::update('update web set tittle = ? where ID = 27', [$req->Home2AdsUrl]);
            //DB::update('update web set tittle = ? where ID = 28', [$req->Home2AdsImg]);
            DB::update('update web set tittle = ? where ID = 29', [$req->quote]);
        }
        catch(Exception $e)
        {
            return 0;
        }
        return 1;
    }

}
