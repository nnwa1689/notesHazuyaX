<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WorksService;
use App\Services\BaseService;

class WorksController extends Controller
{

    private $webData;
    protected $worksService;
    protected $baseService;
    

    public function __construct(WorksService $worksService, BaseService $baseService) 
    {
        $this -> worksService = $worksService;
        $this -> baseService = $baseService;
    }

    public function GetWorksDetailPage($WorksID)
    {
        $this -> webData = $this -> baseService ->WebInit();
        $WorkDetail = $this -> worksService -> GetWorkDetailPublic($WorksID);
        if(count($WorkDetail) <= 0){
            abort(404);
            return;
        }
        $title = $WorkDetail[0] -> WorksName." - ";
        return view('worksDetail',['WorkDetail'=>$WorkDetail, 'webData'=>$this->webData, 'title' => $title]);
    }

    public function GetAllWorksPage()
    {
        $this -> webData = $this -> baseService ->WebInit();
        $WorksList = $this -> worksService -> GetAllWorks();
        $title = "作品集 - ";
        return view('worksList',['WorksList'=>$WorksList, 'webData'=>$this->webData, 'title' => $title]);
    }
}
