<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Services\PageService;

class PageController extends Controller
{

    private $webData;
    protected $baseService;
    protected $pageService;

    public function __construct(BaseService $baseService, PageService $pageService)
    {
        $this -> baseService = $baseService;
        $this -> pageService = $pageService;
    }

    public function getPage($pageID)
    {
        $this -> webData = $this -> baseService ->WebInit();
        $data = $this -> pageService -> GetOnePage($pageID);
        if(count($data) <= 0){
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

}
