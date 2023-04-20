<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

class PostService
{

    /**
     * 拿到所有文章
     *
     * @return postList
     */
    public function GetAllPublicPosts($pageNumber)
    {
        DB::connection('mysql');
        //$start = ($pageNumber - 1) * 10;
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName, admin.Yourname, admin.Avatar FROM Blog JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE Blog.Competence='public' ORDER BY Blog.PostDate DESC) as Post"))->paginate(10);
        //$data = DB::select("SELECT * FROM Blog WHERE Blog.Competence=? OR Blog.Competence=? ORDER BY Blog.PostDate DESC LIMIT ?, 10", ['public', 'protect',$start]);
        return $data;
    }

    /**
     * 拿到特定數量的文章
     *
     * @return postList
     */
    public function GetTopPublicPosts($limit = 5)
    {
        DB::connection('mysql');
        //$start = ($pageNumber - 1) * 10;
        $data = DB::select("(SELECT Blog.*, BClasses.ClassName, admin.Yourname, admin.Avatar FROM Blog JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE Blog.Competence='public' ORDER BY Blog.PostDate DESC limit ?)", [$limit]);
        //$data = DB::select("SELECT * FROM Blog WHERE Blog.Competence=? OR Blog.Competence=? ORDER BY Blog.PostDate DESC LIMIT ?, 10", ['public', 'protect',$start]);
        return $data;
    }

    /**
     * 拿到所有文章
     *
     * @return postList
     */
    public function GetAllPost()
    {
        DB::connection('mysql');
        //$start = ($pageNumber - 1) * 10;
        $data = DB::table(DB::raw("(SELECT * FROM Blog ORDER BY PostDate DESC) as Post"))->paginate(10);
        return $data;
    }

    /**
     * 拿到所有公開分類
     *
     * @return List
     */
    public function GetAllPublicCategory()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM BClasses WHERE SorH=? ORDER BY OrderID ASC", ['show']);
        return $data;
    }

    /**
     * 拿到所有分類
     *
     * @return List
     */
    public function GetAllCategory()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM BClasses ORDER BY OrderID ASC");
        return $data;
    }

    /**
     * 拿到分類資料
     *
     * @return List
     */
    public function GetCategoryDetail($classID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM BClasses WHERE ClassId = ? ORDER BY OrderID ASC", [$classID]);
        return $data;
    }

    /**
     * 拿到分類文章
     *
     * @return List
     */
    public function GetCategoryPublicPosts($classID, $pageNumber = null)
    {
        DB::connection('mysql');
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName, BClasses.Short_Intro, admin.Yourname, admin.Avatar FROM Blog LEFT JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE Blog.Competence='public' AND Blog.ClassId=".$classID." ORDER BY Blog.PostDate DESC) as Categorypost"))->paginate(10);
        return $data;
    }

    /**
     * 拿到分類文章
     *
     * @return List
     */
    public function GetOnePost($postID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Blog join admin on Blog.UserID = admin.username join BClasses on Blog.ClassId = BClasses.ClassId WHERE (Blog.Competence=? OR Blog.Competence=?) AND PostId=? ", ['public', 'protect', $postID]);
        return $data;
    }

    /**
     * 取得下一篇文章
     *
     * @return List
     */
    public function GetNextPost($postID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Blog WHERE PostId>? AND (Competence=? OR Competence=?) ORDER BY PostId ASC LIMIT 0,1", [$postID, 'public', 'protect']);
        return $data;
    }

    /**
     * 以關鍵字搜尋文章
     *
     * @return List
     */
    public function SearchPost($q)
    {
        DB::connection('mysql');
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName, admin.Yourname, admin.Avatar FROM Blog LEFT JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE (Blog.PostTittle LIKE ".$q." OR Blog.PostContant LIKE ".$q.") AND (Blog.Competence='public') ORDER BY Blog.PostId DESC) as search"))->paginate(10);
        return $data;
    }

    /**
     * 取得特定使用者的文章
     *
     * @return List
     */
    public function GetUserPosts($userID)
    {
        DB::connection('mysql');
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName FROM Blog JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE (Competence='public') AND UserID='".$userID."' ORDER BY PostDate DESC) as Post"))->paginate(10);
        return $data;
    }

}
