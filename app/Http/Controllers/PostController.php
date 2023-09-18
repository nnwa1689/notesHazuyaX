<?php
/*
PostController
文章控制器
取得文章列表
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\WorksService;
use App\Services\BaseService;

class PostController extends Controller
{
    private $webData;    
    protected $postService;
    protected $worksService;
    protected $baseService;

    public function __construct(PostService $postService, WorksService $worksService, BaseService $baseService) 
    {
        $this -> postService = $postService;
        $this -> worksService = $worksService;
        $this -> baseService = $baseService;
    }

    //所有文章頁面－帶有pagenum參數
    public function getPostList($pageNumber = null){
        $this -> webData = $this -> baseService ->WebInit();
        if(!preg_match("/^([0-9]+)$/", $pageNumber) || $pageNumber < 0 || !isset($pageNumber)){
            $pageNumber=1;
        }
        $title='讀雜記 - ';
        $data = $this -> postService -> GetAllPublicPosts($pageNumber);
        return view("postindex", ['webData' => $this->webData,'allPosts'=>$data, 'title'=>$title]);
    }

    public function getallCategorypost($classID, $pageNumber = null)
    {
        $this -> webData = $this -> baseService ->WebInit();
        $data = $this -> postService -> GetCategoryPublicPosts($classID, $pageNumber);
        $title=$data[0]->Category->ClassName.' - ';
        return view("category", ['webData' => $this->webData,'allPosts'=>$data, 'title'=>$title]);
    }

    public function getCategoryDetailPage($classID)
    {
        $this -> webData = $this -> baseService ->WebInit();
        $data = $this -> postService -> GetCategoryDetail($classID);
        $title=$data[0]->ClassName.' - ';
        return view("categoryIntro", ['webData' => $this->webData, 'detail'=>$data, 'title'=>$title]);
    }

    public function getOnePost($postID)
    {
        $this -> webData = $this -> baseService ->WebInit();
        $data = $this -> postService -> GetOnePost($postID);

        if(count($data) <= 0){
            abort(404);
            return;
        }
        
        $rightPost = $this -> postService -> GetNextPost($postID);
        return view("post", ['webData' => $this->webData, 'postData'=>$data, 'rightPost'=>$rightPost]);
    }

}
