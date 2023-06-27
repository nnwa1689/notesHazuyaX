<?php

namespace App\Services;

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
        $data = Web::orderBy('ID', 'asc') -> get();
        return $data;
    }

    public function WebInit(){

        if($this -> userService -> CheckLoginStatus())
        {
            $userData = $this -> userService -> GetUserData(session('username'));
        }
        else
        {
            $userData = 0;
        }

        $categoryData = $this -> postService -> GetAllPublicCategory();
        $NavData = $this -> navbarService -> GetTopNavBar();
        $WebData = $this -> GetWebConfig();
        $buttonNavData = $this -> navbarService -> GetButtonNav();

        return ['allCategory'=> $categoryData, 'allNav'=> $NavData, 'webConfig' => $WebData, 'allButtonNav' => $buttonNavData, 'userData'=>$userData];
    }

    public function UpdateWebConfig($req)
    {
        try
        {
            Web::where('ID', 0) -> update(['tittle' => $req->webName]);
            Web::where('ID', 1) -> update(['tittle' => $req->keyWords]);
            Web::where('ID', 2) -> update(['tittle' => $req->descripition]);
            Web::where('ID', 3) -> update(['tittle' => $req->footer]);
            Web::where('ID', 4) -> update(['tittle' => $req->header]);
            Web::where('ID', 5) -> update(['tittle' => $req->Logo]);
            Web::where('ID', 7) -> update(['tittle' => $req->HomePostNum]);
            Web::where('ID', 13) -> update(['tittle' => $req-> URL]);
            Web::where('ID', 20) -> update(['tittle' => $req->FB]);
            Web::where('ID', 21) -> update(['tittle' => $req->IG]);
            Web::where('ID', 22) -> update(['tittle' => $req->TWITTER]);
            Web::where('ID', 23) -> update(['tittle' => $req->APPLEPODCAST]);
            Web::where('ID', 24) -> update(['tittle' => $req->GOOGLEPODCAST]);
            Web::where('ID', 29) -> update(['tittle' => $req->quote]);
        }
        catch(Exception $e)
        {
            return 0;
        }
        return 1;
    }
}
