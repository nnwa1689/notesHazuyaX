<?php
/*
PostController
文章控制器
取得文章列表
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    private $webData;

    public static function getAllPublicPost($pageNumber){
        DB::connection('mysql');
        $start = ($pageNumber - 1) * 10;
        $data = DB::select("SELECT * FROM Blog WHERE Blog.Competence=? OR Blog.Competence=? ORDER BY Blog.PostDate DESC LIMIT ?, 10", ['public', 'protect',$start]);
        return $data;
    }

    public static function getAllPost($pageNumber){
        DB::connection('mysql');
        $start = ($pageNumber - 1) * 10;
        $data = DB::select("SELECT * FROM Blog ORDER BY Blog.PostDate DESC LIMIT ?, 10", [$start]);
        return $data;
    }

    //帶有pagenum參數
    public function getPostList($pageNumber = null){
        $this -> webData = WebController::webInit();
        if(!preg_match("/^([0-9]+)$/", $pageNumber) || $pageNumber < 0 || !isset($pageNumber)){
            $pageNumber=1;
            $title = '';
        }else{
            $title='文章 - ';
        }
        $data = PostController::getAllPublicPost($pageNumber);
        $postnum = ceil(($this->getAllPublicPostNum()[0]->num)/10);
        return view("index", ['webData' => $this->webData,'allPosts'=>$data, 'nowpageNumber'=>$pageNumber, 'postNum' => $postnum, 'title'=>$title]);
    }

    public static function getallCategory()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM BClasses WHERE SorH=? ORDER BY OrderID ASC", ['show']);
        return $data;
    }

    public static function getallCategoryHide()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM BClasses ORDER BY OrderID ASC");
        return $data;
    }

    public static function getCategoryName($classID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM BClasses WHERE SorH=? AND ClassId = ? ORDER BY OrderID ASC", ['show', $classID])[0]->ClassName;
        return $data;
    }

    public function getallCategorypost($classID, $pageNumber = null)
    {
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        if(!preg_match("/^([0-9]+)$/", $pageNumber) || $pageNumber < 0 || !isset($pageNumber))
            $pageNumber=1;
        $start = ($pageNumber - 1) * 10;
        $data = DB::select("SELECT * FROM Blog WHERE (Blog.Competence=? OR Blog.Competence=?) AND ClassId=? ORDER BY Blog.PostDate DESC LIMIT ?, 10", ['public', 'protect', $classID, $start]);
        $categorydata = DB::select("SELECT * FROM BClasses WHERE ClassId=?", [$classID]);
        if(count($categorydata) <= 0){
            abort(404);
            return;
        }
        $title=$categorydata[0]->ClassName.' - ';
        $postnum = ceil(($this->getCategoryPostNum($classID)[0]->num)/10);
        return view("category", ['webData' => $this->webData,'allPosts'=>$data, 'nowpageNumber'=>$pageNumber, 'postNum' => $postnum, 'title'=>$title, 'categorydata' => $categorydata]);
    }

    public function getOnePost($postID)
    {
        $this -> webData = WebController::webInit();
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Blog WHERE (Blog.Competence=? OR Blog.Competence=?) AND PostId=?", ['public', 'protect', $postID]);
        if(count($data) <= 0){
            abort(404);
            return;
        }
        $autorData = UserController::getUserData($data[0]->UserID);
        $leftPost = $this->getLeftPost($postID);
        $rightPost = $this->getRightPost($postID);
        return view("post", ['webData' => $this->webData, 'postData'=>$data, 'autorData'=>$autorData, 'leftPost'=>$leftPost, 'rightPost'=>$rightPost]);
    }

    public static function getAllPublicPostNum()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT COUNT(PostId) as num FROM Blog WHERE (Blog.Competence=? OR Blog.Competence=?) ORDER BY Blog.PostDate", ['public', 'protect']);
        return $data;
    }

    public static function getAllPostNum()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT COUNT(PostId) as num FROM Blog ORDER BY Blog.PostDate");
        return $data;
    }

    public static function getCategoryPostNum($classID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT COUNT(PostId) as num FROM Blog WHERE (Blog.Competence=? OR Blog.Competence=?) AND ClassId=? ORDER BY Blog.PostDate DESC", ['public', 'protect', $classID]);
        return $data;
    }

    public function getLeftPost($postID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Blog WHERE PostId<? AND (Competence=? OR Competence=?) ORDER BY PostId DESC LIMIT 0,1", [$postID, 'public', 'protect']);
        return $data;
    }

    public function getRightPost($postID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Blog WHERE PostId>? AND (Competence=? OR Competence=?) ORDER BY PostId ASC LIMIT 0,1", [$postID, 'public', 'protect']);
        return $data;
    }
}
