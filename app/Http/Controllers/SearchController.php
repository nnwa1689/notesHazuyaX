<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Services\PostService;


class SearchController extends Controller
{
    private $webData;
    protected $baseService;
    protected $postService;

    public function __construct(BaseService $baseService, PostService $postService) 
    {
        $this -> baseService = $baseService;
        $this -> postService = $postService;
    }

    public function searchPage()
    {
        $this -> webData = $this -> baseService ->WebInit();
        return view('search', ['webData'=> $this->webData]);
    }

    public function search(Request $q)
    {
        $this -> webData = $this -> baseService ->WebInit();
        //$q = "'%".htmlspecialchars()."%'";
        $resultData = $this -> postService -> SearchPost($q->input()["search-text"]);
        return view('search', ['webData'=> $this->webData, 'data'=>$resultData, 'q'=>$q]);
    }

}
