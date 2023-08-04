<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Category;
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
        $data = Blog::where('Competence', 'public') -> orderBy('PostDate', 'desc') -> paginate(10);
        return $data;
    }

    /**
     * 拿到特定數量的文章
     *
     * @return postList
     */
    public function GetTopPublicPosts($limit = 5)
    {
        $data = Blog::where('Competence', 'public') -> offset(0) -> limit($limit) -> orderBy('PostDate', 'desc') -> get();
        return $data;
    }

    /**
     * 拿到所有文章
     *
     * @return postList
     */
    public function GetAllPost()
    {
        $data = Blog::orderBy('PostDate', 'desc') -> paginate(10);
        return $data;
    }

    /**
     * 拿到所有公開分類
     *
     * @return List
     */
    public function GetAllPublicCategory()
    {
        $data = Category::where('SorH', 'show') -> orderBy('OrderID', 'asc') -> get();
        return $data;
    }

    /**
     * 拿到所有分類
     *
     * @return List
     */
    public function GetAllCategory()
    {
        $data = Category::orderBy('OrderID', 'asc') -> get();
        return $data;
    }

    /**
     * 拿到分類資料
     *
     * @return List
     */
    public function GetCategoryDetail($classID)
    {
        $data = Category::where('ClassId', $classID) -> get();
        return $data;
    }

    /**
     *更新分類內容
     *
     * @return int
     */
    public function UpdateCategoryDetail($req, $classId)
    {
        Category::where('ClassId', $classId) -> update(
            [
                'ClassName' => $req->ClassName, 
                'Short_Intro' => $req->shortIntro, 
                'Long_Intro' => $req->longIntro 
            ]
        );
        return 1;
    }

    /**
     *批次更新分類狀態
     *應該拆成 CreateCategory，之後看看?畢竟這系統就是能用而已?
     *
     * @return List
     */
    public function UpdateCategoryBatch($req)
    {
        //新分類
        if($req->action=='new')
        {
            if(!empty($req->newName) && !empty($req->newOrder))
            {
                $NewCategory = [
                    'ClassName' => $req->newName, 
                    'SorH' => 'show',
                    'OrderID' => $req->newOrder,
                    'Short_Intro' => '',
                    'Long_Intro' => ''
                ];
                Category::create($NewCategory);
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
                    Category::where('ClassId', $value) -> update(
                        [
                            'ClassName' => $checkedClassName[$value],
                            'OrderID' => $checkedOrder[$value]
                        ]
                    );
                }
            }
            else if($req->action=='setShow')
            {
                foreach($checkedItem as $value)
                {
                    Category::where('ClassId', $value) -> update(
                        ['SorH' => 'show']
                    );
                }
            }
            else if($req->action=='setHide')
            {
                foreach($checkedItem as $value)
                {
                    Category::where('ClassId', $value) -> update(
                        ['SorH' => 'hide']
                    );
                }
            }
            else if($req->action=='delete')
            {
                foreach($checkedItem as $value)
                {
                    //刪除該分類下的文章
                    Blog::where('ClassId', $value) -> delete();
                    Category::where('ClassId', $value) -> delete();
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
        $data = Blog::where('ClassId', $classID) -> where('Competence', 'public') -> orderBy('PostDate', 'desc') -> paginate(10);
        return $data;
    }

    /**
     * 拿到公開文章
     *
     * @return List
     */
    public function GetOnePost($postID)
    {
        $data = Blog::where('PostId', $postID) -> where('Competence', 'public') -> get();
        $data[0] -> PostDate = explode(" ", $data[0] -> PostDate)[0];
        return $data;
    }

    /**
     * 拿到後台文章
     *
     * @return Data
     */
    public function GetOnePostEdit($postID)
    {
        $data = Blog::where('PostId', $postID) -> get();
        return $data;
    }

    /**
     * 取得下一篇文章
     *
     * @return List
     */
    public function GetNextPost($postID)
    {
        $data = Blog::where('PostId', '>', intval($postID)) -> where('Competence', 'public') -> offset(0) -> limit(1) -> orderBy('PostId', 'asc') -> get();
        return $data;
    }

    /**
     * 以關鍵字搜尋文章
     *
     * @return List
     */
    public function SearchPost($q)
    {
        $data = Blog::where('PostTittle', 'like', '%'.$q.'%') -> where('Competence', 'public') -> orderBy('PostId', 'desc') -> paginate(10);
        return $data;
    }

    /**
     * 取得特定使用者的文章(前台暫不使用)
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
        $data = Blog::where('UserID', $userID) -> orderBy('PostDate', 'desc') ->paginate(10);
        return $data;
    }

    /**
     *更新文章
     *
     * @return List
     */
    public function UpdatePosts($req, $postID)
    {        
        Blog::where('PostId', $postID) -> update(
            [
                'Competence' => $req->competance,
                'PostTittle' => $req->postTitle,
                'PostDate' => $req->date,
                'PostContant' => $req->cont,
                'Classes' => "",
                'Reply' => $req->reply,
                'ClassId' => $req->Classes,
                'ReadTime' => $req->ReadTime,
                'CoverImage' => $req->CoverImage
            ]
        );
    }

    /**
     *新增文章
     *
     * @return List
     */
    public function CreatePost($req)
    {
        $NewBlogData = [
            'Competence' => $req->competance,
            'PostTittle' => $req->postTitle,
            'PostDate' => $req->date,
            'PostContant' => $req->cont,
            'Classes' => "",
            'User' => "",
            'Reply' => $req->reply,
            'UserID' => session('username'),
            'ClassId' => $req->Classes,
            'ReadTime' => $req->ReadTime,
            'CoverImage' => $req->CoverImage
        ];
        Blog::create($NewBlogData);
    }

    /**
     *刪除文章
     *
     * @return List
     */
    public function DeletePosts($req)
    {        
        $delPostId = (isset($req->postid) ? $req->postid : '');
        if($delPostId !== '')
        {
            foreach($delPostId as $value)
            {
                Blog::where('PostId', $value) -> delete();
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
        $PostId = (isset($req->postid) ? $req->postid : '');

        if($PostId !== '')
        {
            foreach($PostId as $value)
            {
                Blog::where('PostId', $value) -> update(
                    ['Competence' => 'private']
                );
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
        $PostId = (isset($req->postid) ? $req->postid : '');
        if($PostId !== '')
        {
            foreach($PostId as $value)
            {
                Blog::where('PostId', $value) -> update(
                    ['Competence' => 'public']
                );
            }
        }
    }
}
