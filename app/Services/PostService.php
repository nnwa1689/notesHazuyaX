<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use App\Services\UserService;

class PostService
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this -> userService = $userService;
    }

    /**
     * 拿到所有文章
     *
     * @return postList
     */
    public function GetAllPublicPosts($pageNumber)
    {
        DB::connection('mysql');
        //$start = ($pageNumber - 1) * 10;
        /*$data = Blog::select(['PostId', 'Competence, PostTittle', 'PostDate', 'PostContent', 'ReadTime', 'CoverImage', 'ClassName', 'Yourname', 'Avatar'])
            -> where('Competence', 'on') -> orderBy('PostDate', 'desc') -> paginate(10);
        $data2 = Blog::select(['PostId', 'Competence, PostTittle', 'PostDate', 'PostContent', 'ReadTime', 'CoverImage', 'ClassName', 'Yourname', 'Avatar'])
        -> where('Competence', 'on') -> orderBy('PostDate', 'desc');*/

        $data = Blog::where('Competence', 'on') -> orderBy('PostDate', 'desc') -> get() -> paginate(10);
        //$data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName, admin.Yourname, admin.Avatar FROM Blog JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE Blog.Competence='public') as Post ORDER BY Post.PostDate DESC"))->paginate(10);
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
        $data = DB::select("(SELECT Blog.*, BClasses.ClassName, admin.Yourname, admin.Avatar FROM Blog JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE Blog.Competence='public' ORDER BY Blog.PostDate DESC limit ?)", [$limit]);
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
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName, admin.Yourname, admin.Avatar FROM Blog JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId)) as Post ORDER BY Post.PostDate DESC"))->paginate(10);
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
     *更新分類內容
     *
     * @return List
     */
    public function UpdateCategoryDetail($req, $classId)
    {
        DB::connection('mysql');
        DB::update
        (
            "UPDATE BClasses SET ClassName = ?, Short_Intro = ?, Long_Intro = ?  WHERE ClassId = ?",
            [$req->ClassName, $req->shortIntro, $req->longIntro, $classId]
        );
    }

    /**
     *批次更新分類狀態
     *應該拆成 CreateCategory，之後看看?畢竟這系統就是能用而已?
     *
     * @return List
     */
    public function UpdateCategoryBatch($req)
    {
        DB::connection('mysql');
        if($req->action=='new')
        {
            if(!empty($req->newName) && !empty($req->newOrder))
            {
                DB::insert("INSERT INTO BClasses (ClassName, SorH, OrderID, Short_Intro, Long_Intro) VALUES ( ?, 'show', ?, '', '' )",[$req->newName, $req->newOrder]);
            }
        }
        else if($req->action=='update' || $req->action=='setShow' || $req->action=='setHide' || $req->action=='delete')
        {

            $checkedItem = $req->classid;
            $checkedClassName = $req->ClassName;
            $checkedOrder = $req->order;

            if(!isset($checkedItem))
            {
                return redirect('/admin/editCategory');

            }
            else if($req->action=='update')
            {
                foreach($checkedItem as $value)
                {
                    DB::update("UPDATE BClasses SET ClassName = ?, OrderID = ? WHERE `BClasses`.`ClassId` = ?", [$checkedClassName[$value], $checkedOrder[$value], $value]);
                }

            }
            else if($req->action=='setShow')
            {
                foreach($checkedItem as $value)
                {
                    DB::update("UPDATE BClasses SET SorH = 'show' WHERE `BClasses`.`ClassId` = ?", [$value]);
                }
            }
            else if($req->action=='setHide')
            {
                foreach($checkedItem as $value)
                {
                    DB::update("UPDATE BClasses SET SorH = 'hide' WHERE `BClasses`.`ClassId` = ?", [$value]);
                }
            }
            else if($req->action=='delete')
            {
                foreach($checkedItem as $value)
                {
                    //刪除該分類下的文章
                    DB::delete("DELETE FROM Blog WHERE ClassId = ?", [$value]);
                    DB::delete("DELETE FROM BClasses WHERE ClassId = ?", [$value]);
                }
            }
        }
    }

    /**
     * 拿到分類文章
     *
     * @return List
     */
    public function GetCategoryPublicPosts($classID, $pageNumber = null)
    {
        DB::connection('mysql');
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName, BClasses.Short_Intro, admin.Yourname, admin.Avatar FROM Blog LEFT JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE Blog.Competence='public' AND Blog.ClassId=".$classID.") as Categorypost ORDER BY Categorypost.PostDate DESC"))->paginate(10);
        return $data;
    }

    /**
     * 拿到公開文章
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
     * 拿到後台文章
     *
     * @return Data
     */
    public function GetOnePostEdit($postID)
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM Blog join admin on Blog.UserID = admin.username join BClasses on Blog.ClassId = BClasses.ClassId WHERE PostId=? ", [$postID]);
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
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName, admin.Yourname, admin.Avatar FROM Blog LEFT JOIN admin ON (Blog.UserID = admin.username) JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE (Blog.PostTittle LIKE ".$q." OR Blog.PostContant LIKE ".$q.") AND (Blog.Competence='public')) as search ORDER BY search.PostId DESC"))->paginate(10);
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
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName FROM Blog JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE (Competence='public') AND UserID='".$userID."') as Post ORDER BY Post.PostDate DESC"))->paginate(10);
        return $data;
    }

    /**
     * 取得特定使用者的文章
     *
     * @return List
     */
    public function GetUserPostsEdit($userID)
    {
        DB::connection('mysql');
        $data = DB::table(DB::raw("(SELECT Blog.*, BClasses.ClassName FROM Blog JOIN BClasses ON (Blog.ClassId = BClasses.ClassId) WHERE UserID='".$userID."') as Post ORDER BY Post.PostDate DESC"))->paginate(10);
        return $data;
    }

    /**
     *更新文章
     *
     * @return List
     */
    public function UpdatePosts($req, $postID)
    {
        DB::connection('mysql');
        DB::update
        (
            'UPDATE Blog SET Competence = ?,PostTittle = ?, PostDate = ?, PostContant = ?, Classes = ?, Reply = ?, ClassId = ?, ReadTime = ?, CoverImage = ? WHERE `Blog`.`PostId` = ?',
            [
                $req->competance,
                $req->postTitle,
                $req->date,
                $req->cont,
                "",
                $req->reply,
                $req->Classes,
                $req->ReadTime,
                $req->CoverImage,
                $postID
            ]);
    }

    /**
     *新增文章
     *
     * @return List
     */
    public function CreatePost($req)
    {
        DB::connection('mysql');
        DB::insert
        (
            "INSERT INTO Blog (Competence, PostTittle, PostDate, PostContant, Classes, User, Reply, UserID, ClassId, ReadTime, CoverImage) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )",
            [
                $req->competance,
                $req->postTitle,
                $req->date,
                $req->cont,
                "",
                $this -> userService -> GetUserData(session('username'))[0]->Yourname,
                $req->reply,
                session('username'),
                $req->Classes,
                $req->ReadTime,
                $req->CoverImage
            ]
        );
    }

    /**
     *刪除文章
     *
     * @return List
     */
    public function DeletePosts($req)
    {
        DB::connection('mysql');
        $delPostId = (isset($req->postid) ? $req->postid : '');

        if($delPostId !== '')
        {
            foreach($delPostId as $value)
            {
                DB::delete("DELETE FROM Blog WHERE PostId = ?", [$value]);
            }

        }
    }

    /**
     *批次隱藏文章
     *
     * @return List
     */
    public function SetPostsPrivate($req)
    {
        DB::connection('mysql');
        $PostId = (isset($req->postid) ? $req->postid : '');

        if($PostId !== '')
        {
            foreach($PostId as $value)
            {
                DB::update
                (
                    'UPDATE Blog SET Competence = ? WHERE `Blog`.`PostId` = ?',
                    [
                        "private",
                        $value
                    ]);
            }

        }
    }

    /**
     *批次公開文章
     *
     * @return List
     */
    public function SetPostsPublic($req)
    {
        DB::connection('mysql');
        $PostId = (isset($req->postid) ? $req->postid : '');

        if($PostId !== '')
        {
            foreach($PostId as $value)
            {
                DB::update
                (
                    'UPDATE Blog SET Competence = ? WHERE `Blog`.`PostId` = ?',
                    [
                        "public",
                        $value
                    ]);
            }

        }
    }

}
