<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;
use App\Services\UserService;
use App\Services\PostService;
use App\Services\NavbarService;


class BaseService
{

    protected $postService;
    protected $navbarService;

    public function __construct(PostService $postService, NavbarService $navbarService, UserService $userService) 
    {
        $this -> postService = $postService;
        $this -> navbarService = $navbarService;
        $this -> userService = $userService;
    }

    public function GetWebConfig()
    {
       DB::connection('mysql');
       $data = DB::select("SELECT * FROM web ORDER BY ID ASC");
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

}
