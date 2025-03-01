<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Services\BaseService;

class WhatNewsController extends Controller
{

    private $webData;
    protected $baseService;

    public function __construct(BaseService $baseService) 
    {
        $this -> baseService = $baseService;
    }

    public static function getAllHomePost()
    {
        DB::connection('mysql');
        return DB::select("SELECT * FROM HomePost WHERE Competence=? ORDER BY PostId DESC", ['public']);
    }

    public static function getFiveHomePost()
    {
        DB::connection('mysql');
        return DB::select("SELECT * FROM HomePost WHERE Competence=? ORDER BY PostId DESC LIMIT 0, 2", ['public']);
    }

    public function getOnePost($postID)
    {
        $this -> webData = $this -> baseService ->WebInit();
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM HomePost WHERE PostId=? AND Competence=?",[$postID, 'public']);
        return view('whatnews',['webData'=>$this->webData, 'data'=>$data]);
    }

    public function getHomePost()
    {
        $this -> webData = $this -> baseService ->WebInit();
        $data = $this->getAllHomePost();
        return view('whatnewslist', ['webData'=>$this->webData, 'data'=>$data]);
    }
}
