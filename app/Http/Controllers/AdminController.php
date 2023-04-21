<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Services\PostService;
use App\Services\UserService;
use App\Services\BaseService;
use App\Services\FileService;


class AdminController extends Controller
{
    protected $postService;
    protected $userService;
    protected $baseService;
    protected $fileService;

    public function __construct(
        PostService $postService, 
        UserService $userService, 
        BaseService $baseService,
        FileService $fileService
        ) 
    {
        $this -> postService = $postService;
        $this -> userService = $userService;
        $this -> baseService = $baseService;
        $this -> fileService = $fileService;
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
        return view('admin/uploadFiles', ['username'=>session()->get('username'), 'data'=>'false']);
    }

    public function uploadFiles()
    {
        $result = $this->fileService->UploadFile($_FILES['myFile']);
        if($result)
            return view('admin/uploadFiles', ['username'=>session()->get('username'), 'data'=>$result]);
        else
            return abort(500);
    }

    public function showEditPost($postID = null)
    {

        $allCategory =  $this -> postService -> GetAllPublicCategory();

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
        if($userData[0]->Law_Post == 1){
            $listData = $this -> postService -> GetUserPostsEdit(session('username')); 
        }else if($userData[0]->Law_Post == 2){
            $listData = $this -> postService -> GetAllPost();
        }
        //判斷使用者權限，是否可以編輯他人的文章
        return view('admin/posts', ['username'=>session()->get('username'), 'listData'=>$listData]);
    }

    public function updatePost(Request $req, $postID)
    {
        $postData = $this -> postService -> GetOnePostEdit($postID);
        if($postData[0]->Law_Post == 1){
            if($postData[0]->UserID !== session('username')){
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

    public function deletePost(Request $req)
    {
        $this -> postService -> DeletePosts($req);
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
        DB::connection('mysql');

        if($pageID=="new"){
            return view('admin/editPage', ['username'=>session()->get('username')]);

        }else if(isset($pageID)){
            $pageData = DB::select("select * from Page where PageId=?", [$pageID]);
            if(!(count($pageData) > 0)){
                return redirect('/admin/editPage');
            }
            return view('admin/editPage', ['username'=>session()->get('username'), 'pageData'=> $pageData]);
        }else{
            $allPage = DB::select("select * from Page");
            return view('admin/pages', ['username'=>session()->get('username'), 'allPage'=> $allPage]);
        }
    }

    public function newPage()
    {
        DB::connection('mysql');
        DB::insert("INSERT INTO Page (PageId, Competence, PageName, PageContant) VALUES (?, ?, ?, ?)", [$_POST['pageID'], $_POST['competance'], $_POST['pageTitle'], $_POST['cont']]);
        return redirect('/admin/editPage');
    }

    public function updatePage($pageID)
    {
        DB::connection('mysql');
        DB::update("update Page set PageId=?, Competence=?, PageName=?, PageContant=? where PageId=?", [$_POST['pageID'], $_POST['competance'], $_POST['pageTitle'], $_POST['cont'], $pageID]);
        return redirect('/admin/editPage');
    }

    public function deletePage()
    {
        DB::connection('mysql');
        if(!empty($_POST['pageID'])){
            $delPage = $_POST['pageID'];
            foreach($delPage as $v){
                DB::delete("delete from Page where PageId=?", [$v]);
            }
        }

        return redirect('/admin/editPage');
    }

    public function showEditNav($type = 'top')
    {
        DB::connection('mysql');

        if($type == 'top'){
            $allNav = DB::select("select * from Navigate where type=0");
        }else if($type == 'btn'){
            $allNav = DB::select("select * from Navigate where type=1");
        }
        return view('admin/navEdit', ['username'=>session()->get('username'), 'allNav'=> $allNav, 'type'=>$type]);
    }

    public function updateNav($type)
    {
        if($type=="top")
            $typeNum = 0;
        else
            $typeNum = 1;

        DB::connection('mysql');
        if($_POST['action']=='new'){

            if(!empty($_POST['newName']) && !empty($_POST['newOrder'])){

                DB::insert("INSERT INTO Navigate (NavigateId,NavigateName,URL,Competence,type) VALUES ( ?, ?, ?, ?, ? )",[$_POST['newOrder'], $_POST['newName'], $_POST['newURL'], $_POST['newCompetence'], $typeNum]);

            }

        }else if($_POST['action']=='update' || $_POST['action']=='delete'){

            $checkedItem = $_POST['navid'];
            $checkedNavName = $_POST['NavName'];
            $checkedOrder = $_POST['order'];
            $checkedURL = $_POST['URL'];
            $checkedCompetence = $_POST['Competence'];

            if(!isset($checkedItem)){
                return redirect('/admin/editNav/'.$type);

            }else if($_POST['action']=='update'){

                foreach($checkedItem as $value){

                    DB::update("UPDATE Navigate SET NavigateId = ?, NavigateName = ?, URL = ?, Competence = ?, type = ? WHERE IndexId = ?", [$checkedOrder[$value], $checkedNavName[$value], $checkedURL[$value], $checkedCompetence[$value], $typeNum, $value]);

                }

            }else if($_POST['action']=='delete'){

                foreach($checkedItem as $value){

                    DB::delete("DELETE FROM Navigate WHERE IndexId = ?", [$value]);

                }
            }
        }
        return redirect('/admin/editNav/'.$type);
    }

    public function showMySettingPage()
    {
        DB::connection('mysql');
        $userData = $this -> userService -> GetUserData(session('username'));
        return view('admin/mySetting', ['username'=>session()->get('username'), 'userData' => $userData]);
    }

    public function updateMySetting()
    {
        DB::connection('mysql');
        $userData = $this -> userService -> GetUserData(session('username'));
        if(password_verify($_POST['oldPw'], $userData[0]->pw)){
            if(!empty($_POST['newPw'])){
                if($_POST['newPw'] == $_POST['reNewPw']){
                    DB::update('update admin set pw=?, Email=?, Url_Linked = ?, Url_GitHub = ?, Yourname=?, Avatar=?, IntroductionSelf=?,PersonBackground=?, Signature=? where username=?', [ password_hash($_POST['newPw'], PASSWORD_DEFAULT), $_POST['Email'], $_POST['Url_Linked'], $_POST['Url_GitHub'], $_POST['Yourname'], $_POST['avatar'], $_POST['IntroductionSelf'], $_POST['PersonBackground'], $_POST['Signature'], session('username') ]);
                }else{
                    $msg = "新密碼不正確！";
                    return view('admin/mySetting', ['username'=>session()->get('username'), 'userData' => $userData, 'msg'=>$msg]);
                }
            }else{
                DB::update('update admin set Email=?, Url_Linked = ?, Url_GitHub = ?, Yourname=?, Avatar=?, IntroductionSelf=?,PersonBackground=?, Signature=? where username=?', [ $_POST['Email'], $_POST['Url_Linked'], $_POST['Url_GitHub'], $_POST['Yourname'], $_POST['avatar'], $_POST['IntroductionSelf'], $_POST['PersonBackground'], $_POST['Signature'], session('username') ]);
            }

        }else{
            $msg = "舊密碼錯誤！";
            return view('admin/mySetting', ['username'=>session()->get('username'), 'userData' => $userData, 'msg'=>$msg]);
        }
        return redirect('/admin/mySetting');
    }

    /* Works */
    public function GetAllWorksListSetPage()
    {
        DB::connection('mysql');
        $Works = DB::select(('select PID, WorksID, WorksName from Works'));
        return view('admin/works', ['username'=>session()->get('username'), 'Works' => $Works]);
    }

    public function GetWorksDetailSetPage($WorksPID = null)
    {
        DB::connection('mysql');
        if ($WorksPID == "new"){
            return view('admin/editWorksDetail', ['username'=>session()->get('username')]);
        } else if ( isset($WorksPID) ){
            $WorkDetail = DB::select(
                ('select Works.PID, Works.OrderID, Works.WorksID, Works.WorksName, Works.ShortIntro, Works.Intro, Works.CoverImage, Works.Customer, Works.Url, WorksStaff.PID as StaffPID, WorksStaff.StaffName, WorksStaff.StaffTitle, WorksStaff.StaffImage, WorksStaff.StaffUrl from Works right join WorksStaff on Works.PID = WorksStaff.WorksPID where Works.PID = ?'), [$WorksPID]);
            return view('admin/editWorksDetail', ['username'=>session()->get('username'), 'WorkDetail' => $WorkDetail]);
        } else {
            return redirect('/admin');
        }
    }

    public function SetWorksDetailReturnPage($WorksPID = null)
    {
        DB::connection('mysql');
        if ($WorksPID == "new"){
            DB::transaction(function()
            {
                $NextPID = DB::select("SHOW TABLE STATUS LIKE 'Works'")[0] -> Auto_increment;
                DB::insert(
                    "INSERT INTO Works (WorksID, WorksName, Customer, Intro, CoverImage, Url, OrderID, ShortIntro) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
                      [$_POST['WorksID'],
                      $_POST['WorksName'],
                      $_POST['Customer'],
                      $_POST['Intro'],
                      $_POST['CoverImage'],
                      $_POST['Url'],
                      $_POST['OrderID'],
                      $_POST['ShortIntro']
                      ]
                    );
                for ($i = 1; $i < 6; $i++){
                    DB::insert(
                        "INSERT INTO WorksStaff (WorksPID, StaffName, StaffTitle, StaffImage, StaffUrl) VALUE (?, ?, ?, ?, ?)",
                    [
                        $NextPID,
                        $_POST['staff'.$i.'_name'],
                        $_POST['staff'.$i.'_title'],
                        $_POST['staff'.$i.'_Image'],
                        $_POST['staff'.$i.'_Url']
                    ]);
                }
            });
            return redirect('/admin/works');
        } else if (isset($WorksPID)) {
            DB::transaction(function() use ($WorksPID)
            {
                DB::update(
                    "update Works set WorksID = ?, WorksName = ?, Customer = ?, Intro = ?, CoverImage = ?, Url = ?, OrderID = ?, ShortIntro = ? where Works.PID = ?",
                      [$_POST['WorksID'],
                      $_POST['WorksName'],
                      $_POST['Customer'],
                      $_POST['Intro'],
                      $_POST['CoverImage'],
                      $_POST['Url'],
                      $_POST['OrderID'],
                      $_POST['ShortIntro'],
                      $WorksPID
                      ]
                    );
                for ($i = 1; $i < 6; $i++){
                    DB::update(
                        "update WorksStaff set StaffName = ?, StaffTitle = ?, StaffImage = ?, StaffUrl = ? where PID = ?",
                    [
                        $_POST['staff'.$i.'_name'],
                        $_POST['staff'.$i.'_title'],
                        $_POST['staff'.$i.'_Image'],
                        $_POST['staff'.$i.'_Url'],
                        $_POST['staff'.$i.'_StaffPID']
                    ]
                );
                }
            });
            return redirect('/admin/works/'.$WorksPID);
        } else {
            return redirect('/admin');
        }
        $Works = DB::select(('select PID, WorksID, WorksName from Works'));
        return view('admin/works', ['username'=>session()->get('username'), 'Works' => $Works]);
    }

    public function DeleteWorks()
    {

        DB::connection('mysql');
        $delWorksPID = (isset($_POST['WorksID']) ? $_POST['WorksID'] : '');
        if($delWorksPID == ''){

        }else{
            foreach($delWorksPID as $value){
                DB::transaction(function() use ($value)
                {
                    DB::delete("DELETE FROM Works WHERE PID = ?", [$value]);
                    DB::delete("DELETE FROM WorksStaff WHERE WorksPID = ?", [$value]);
                });
            }

        }
        return redirect('/admin/works');

    }


}
