<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Services\PostService;
use App\Services\UserService;
use App\Services\BaseService;
use App\Services\FileService;
use App\Services\PageService;
use App\Services\NavbarService;
use App\Services\WorksService;


class AdminController extends Controller
{
    protected $postService;
    protected $userService;
    protected $baseService;
    protected $fileService;
    protected $pageService;
    protected $navbarService;
    protected $worksService;

    public function __construct(
        PostService $postService, 
        UserService $userService, 
        BaseService $baseService,
        FileService $fileService,
        PageService $pageService,
        NavbarService $navbarService,
        WorksService $worksService
        ) 
    {
        $this -> postService = $postService;
        $this -> userService = $userService;
        $this -> baseService = $baseService;
        $this -> fileService = $fileService;
        $this -> pageService = $pageService;
        $this -> navbarService = $navbarService;
        $this -> worksService = $worksService;
    }

    public function showAdminIndex()
    {
        $selfUserData = $this -> userService -> GetUserData(session()->get('username'));
        return view('admin/adminHome', ['username'=>session()->get('username'), 'selfUserData'=>$selfUserData, /*'mbData'=>$mbData*/]);
    }

    public function showAdminWebInfo()
    {
        $data = $this -> baseService -> GetWebConfig();
        return view('admin/webInfo', ['username'=>session()->get('username'), 'data'=>$data]);
    }

    public function updateWebInfo(Request $request)
    {
        $res = $this -> baseService -> UpdateWebConfig($request);
        if($res)
            return redirect('/admin/webInfo');
        else
            return abort(500);
    }

    public function showAdminFiles($pageNumber=1)
    {
        $data = $this -> fileService -> GetFiles();
        return view('admin/files', ['username'=>session()->get('username'), 'data'=>$data]);
    }

    public function deleteFiles(Request $request)
    {
        $result = $this->fileService->DeleteFiles($request->mediaid);
        if($result)
            return redirect('/admin/files');
        else
            return abort(500);
    }

    public function showUploadFiles()
    {
        return view('admin/uploadFiles', ['username'=>session()->get('username'), 'data'=>'false', 'error' => ""]);
    }

    public function uploadFiles()
    {

        $result = [];
        $error = "";

        if ($_FILES['myFile']['name'][0] == 0) {
            $error = "未選取任何檔案！";
            $result = "false";
        } else {
            for( $i = 0; $i < count($_FILES['myFile']['name']); $i++ ) {

                $result[$i] = $this->fileService->UploadFile(
                    $_FILES['myFile']['name'][$i], 
                    $_FILES['myFile']['size'][$i], 
                    $_FILES['myFile']['tmp_name'][$i]
                );
                
                if ($result[$i] == 0) {
                    $error += $_FILES['myFile']['name'][$i] + ', ';
                }
    
            }
        }

        //例外處理
        if ($error !== "") {
            $error += "上傳失敗，請檢查格式、大小。";
        }
        
        return view('admin/uploadFiles', ['username'=>session()->get('username'), 'data'=>$result, 'error' => $error]);
    }

    public function showEditPost($postID = null)
    {

        $allCategory =  $this -> postService -> GetAllCategory();

        if($postID=="new")
        {
            $postData = array(
                'date'=>Carbon::now()->setTimezone("Asia/Taipei")->toDateTimeString());
        }
        else if(preg_match("/^([0-9]+)$/", $postID))
        {
            $postData = $this -> postService -> GetOnePostEdit($postID);
            //$userData = $this -> userService -> GetUserData(session('username'));
            if($postData[0]->Law_Post == 1){
                if($postData[0]->UserID != session('username')){
                    return redirect('/');
                }
            }
            //判斷使用者權限，是否可以編輯不屬於自己的文章
        }
        else
        {
            return redirect('/admin/editPost/p/1');
        }
        return view('admin/editPost', ['username'=>session()->get('username'), 'allCategory'=>$allCategory, 'postData'=>$postData]);

    }

    public function showEditPostList($pageNumber = 1)
    {
        $userData = $this -> userService -> GetUserData(session('username'));
        if($userData[0]->Law_Post == 1)
        {
            $listData = $this -> postService -> GetUserPostsEdit(session('username')); 
        }
        else if($userData[0]->Law_Post == 2)
        {
            $listData = $this -> postService -> GetAllPost();
        }
        //判斷使用者權限，是否可以編輯他人的文章
        return view('admin/posts', ['username'=>session()->get('username'), 'listData'=>$listData]);
    }

    public function updatePost(Request $req, $postID)
    {
        $postData = $this -> postService -> GetOnePostEdit($postID);
        if($postData[0]->Law_Post == 1)
        {
            if($postData[0]->UserID !== session('username'))
            {
                return redirect('/');
            }
        }
        $this -> postService -> UpdatePosts($req, $postID);
        return redirect('/admin/editPost/'.$postID);
    }

    public function newPost(Request $req)
    {
        $this -> postService -> CreatePost($req);
        return redirect('/admin/editPost');
    }

    public function MultipleHandlePost(Request $req)
    {
        if ($req -> action == "delete") {
            $this -> postService -> DeletePosts($req);
        } else if ($req -> action == "public") {
            $this -> postService -> SetPostsPublic($req);
        } else if ($req -> action == "private") { 
            $this -> postService -> SetPostsPrivate($req);
        }
        return redirect('/admin/editPost');
    }

    public function CategoryDetailEdit($classId = null)
    {
        $categoryData = $this -> postService -> GetCategoryDetail($classId);
        return view('admin/editCategoryDetail', ['username'=>session()->get('username'), 'categoryData'=>$categoryData]);
    }

    public function UpdateCategoryDetail(Request $req, $classId = null)
    {
        $this -> postService -> UpdateCategoryDetail($req, $classId);
        return redirect('/admin/editCategoryDetail/'.$classId);
    }

    public function showAdminCategory()
    {
        $allCategory = $this -> postService -> GetAllCategory();
        return view('admin/categoryEdit', ['username'=>session()->get('username'), 'allCategory'=>$allCategory]);
    }

    public function updateCategory(Request $req)
    {
        $this -> postService -> UpdateCategoryBatch($req);
        return redirect('/admin/editCategory');

    }

    /*
    public function showEditNews($postID = null)
    {

        DB::connection('mysql');

        if($postID=="new"){

            $postData = array('date'=>Carbon::now()->setTimezone("Asia/Taipei")->toDateTimeString());

        }else if(preg_match("/^([0-9]+)$/", $postID)){

            $postData = DB::select("SELECT * FROM HomePost where PostId = ?", [$postID]);

        }else{

            return redirect('/admin/editNews/p/1');

        }
        return view('admin/editNews', ['username'=>session()->get('username'), 'postData'=>$postData]);

    }

    public function showEditNewsList($pageNumber = 1)
    {
        DB::connection('mysql');
        $start = ($pageNumber - 1) * 10;
        $listData = DB::select("select * from HomePost order by PostDate DESC  LIMIT ?, 10", [$start]);
        $postNum = ceil(DB::select("select count(PostId) as num from HomePost order by PostDate DESC")[0]->num/10);
        return view('admin/newsList', ['username'=>session()->get('username'), 'listData'=>$listData, 'postNum'=>$postNum, 'nowpageNumber'=>$pageNumber]);
    }

    public function updateNews($postID)
    {
        DB::connection('mysql');
        DB::update('UPDATE HomePost SET Competence = ?,PostTittle = ?, PostDate = ?, PostContant = ? WHERE `HomePost`.`PostId` = ?', [$_POST['competance'], $_POST['postTitle'], $_POST['date'], $_POST['cont'], $postID]);
        return redirect('/admin/editNews/'.$postID);
    }

    public function newNews()
    {
        DB::connection('mysql');
        DB::insert("INSERT INTO HomePost (Competence, PostTittle, PostDate, PostContant) VALUES ( ?, ?, ?, ? )", [$_POST['competance'], $_POST['postTitle'], $_POST['date'], $_POST['cont']]);
        return redirect('/admin/editNews');
    }

    public function deleteNews()
    {
        DB::connection('mysql');
        $delPostId = (isset($_POST['postid']) ? $_POST['postid'] : '');
        if($delPostId == ''){

        }else{
            foreach($delPostId as $value){
                DB::delete("DELETE FROM HomePost WHERE PostId = ?", [$value]);
            }

        }
        return redirect('/admin/editNews');
    }
    */

    public function showEditAccount($username = null)
    {
        if($username=="new")
        {
            return view('admin/accountEdit', ['username'=>session()->get('username')]);
        }
        else if(isset($username))
        {
            $userData = $this -> userService -> GetUserData($username);
            if(!(count($userData) > 0)){
                return redirect('/admin/editAccount');
            }
            return view('admin/accountEdit', ['username'=>session()->get('username'), 'userData'=> $userData]);
        }
        else
        {
            $allUser = $this -> userService -> GetAllUser();
            return view('admin/accounts', ['username'=>session()->get('username'), 'allUser'=> $allUser]);
        }
    }

    public function addAccount(Request $req)
    {
        $this -> userService -> CreateUser($req);
        return redirect('/admin/editAccount');
    }

    public function updateAccount(Request $req, $username)
    {
        $this -> userService -> UpdateUser($req, $username);
        return redirect('/admin/editAccount');
    }

    public function deleteAccount(Request $req)
    {
        $this -> userService -> DeleteUsers($req);
        return redirect('/admin/editAccount');
    }

    public function showEditPage($pageID = null)
    {
        if($pageID=="new")
        {
            return view('admin/editPage', ['username'=>session()->get('username')]);

        }
        else if(isset($pageID))
        {
            $pageData = $this -> pageService -> GetOnePageEdit($pageID);
            if(!(count($pageData) > 0))
            {
                return redirect('/admin/editPage');
            }
            return view('admin/editPage', ['username'=>session()->get('username'), 'pageData'=> $pageData]);
        }
        else
        {
            $allPage = $this -> pageService -> GetAllPages();
            return view('admin/pages', ['username'=>session()->get('username'), 'allPage'=> $allPage]);
        }
    }

    public function newPage(Request $req)
    {
        $this -> pageService -> InsertNewPage($req);
        return redirect('/admin/editPage');
    }

    public function updatePage(Request $req ,$pageID)
    {
        $this -> pageService -> UpdatePage($req, $pageID);
        return redirect('/admin/editPage');
    }

    public function deletePage(Request $req)
    {
        if(!empty($req -> pageID))
        {
            $this -> pageService -> DeletePages($req);
        }
        return redirect('/admin/editPage');
    }

    public function showEditNav($type = 'top')
    {
        if($type == 'top')
        {
            $allNav = $this -> navbarService -> GetAllTopNavbarEdit();
        }
        else if($type == 'btn')
        {
            $allNav = $this -> navbarService -> GetAllBtnNavbarEdit();
        }
        return view('admin/navEdit', ['username'=>session()->get('username'), 'allNav'=> $allNav, 'type'=>$type]);
    }

    public function updateNav(Request $req, $type = "top")
    {
        if($type=="top")
        {            
            $this -> navbarService -> UpdateNavbars($req, 0);
        }
        else if($type == "btn")
        {
            $this -> navbarService -> UpdateNavbars($req, 1);
        }
        return redirect('/admin/editNav/'.$type);
    }

    public function showMySettingPage()
    {
        $userData = $this -> userService -> GetUserData(session('username'));
        return view('admin/mySetting', ['username'=>session()->get('username'), 'userData' => $userData]);
    }

    public function updateMySetting(Request $req)
    {
        $result = $this -> userService -> UpdateUserData($req);
        $userData = $this -> userService -> GetUserData(session('username'));
        if($result == -1)
        {
            $msg = "新密碼不正確！";
            return view('admin/mySetting', ['username'=>session()->get('username'), 'userData' => $userData, 'msg'=>$msg]);
        }
        else if($result == 0)
        {
            $msg = "舊密碼錯誤！";
            return view('admin/mySetting', ['username'=>session()->get('username'), 'userData' => $userData, 'msg'=>$msg]);
        }
        return redirect('/admin/mySetting');
    }

    /* Works */
    public function GetAllWorksListSetPage()
    {
        $Works = $this -> worksService -> GetAllWorks();
        return view('admin/works', ['username'=>session()->get('username'), 'Works' => $Works]);
    }

    public function GetWorksDetailSetPage($WorksPID = null)
    {
        if ($WorksPID == "new")
        {
            return view('admin/editWorksDetail', ['username'=>session()->get('username')]);
        } 
        else if ( isset($WorksPID) )
        {
            $WorkDetail = $this -> worksService -> GetWorkDetailByPID($WorksPID);
            return view('admin/editWorksDetail', ['username'=>session()->get('username'), 'WorkDetail' => $WorkDetail]);
        } 
        else
        {
            return redirect('/admin');
        }
    }

    public function SetWorksDetailReturnPage(Request $req, $WorksPID = null)
    {
        if ($WorksPID == "new")
        {
            $this -> worksService -> InsertWork($req);
            return redirect('/admin/works');
        } 
        else if (isset($WorksPID)) 
        {
            $this -> worksService -> UpdateWork($req, $WorksPID);
            return redirect('/admin/works/'.$WorksPID);
        } 
        else 
        {
            return redirect('/admin');
        }

        $Works = $this -> worksService -> GetAllWorks();
        return view('admin/works', ['username'=>session()->get('username'), 'Works' => $Works]);
    }

    public function DeleteWorks(Request $req)
    {
        $this -> worksService -> DeleteWork($req);
        return redirect('/admin/works');
    }


}
