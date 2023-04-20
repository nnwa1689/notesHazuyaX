<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Services\PostService;
use App\Services\UserService;


class AdminController extends Controller
{
    protected $postService;
    protected $userService;

    public function __construct(PostService $postService, UserService $userService) 
    {
        $this -> postService = $postService;
        $this -> userService = $userService;
    }

    public function showAdminIndex()
    {
        $selfUserData = $this -> userService -> GetUserData(session()->get('username'));
        return view('admin/adminHome', ['username'=>session()->get('username'), 'selfUserData'=>$selfUserData, /*'mbData'=>$mbData*/]);
    }

    public function showAdminWebInfo()
    {
        DB::connection('mysql');
        $data = DB::select("SELECT * FROM web ORDER BY ID ASC");
        return view('admin/webInfo', ['username'=>session()->get('username'), 'data'=>$data]);
    }

    public function updateWebInfo()
    {
        DB::connection('mysql');
        try{
            DB::update('update web set tittle = ? where ID = 0', [$_POST['webName']]);
            DB::update('update web set tittle = ? where ID = 13', [$_POST['URL']]);
            DB::update('update web set tittle = ? where ID = 5', [$_POST['Logo']]);
            DB::update('update web set tittle = ? where ID = 1', [$_POST['keyWords']]);
            DB::update('update web set tittle = ? where ID = 2', [$_POST['descripition']]);
            DB::update('update web set tittle = ? where ID = 4', [$_POST['header']]);
            DB::update('update web set tittle = ? where ID = 3', [$_POST['footer']]);
            DB::update('update web set tittle = ? where ID = 7', [$_POST['HomePostNum']]);
            DB::update('update web set tittle = ? where ID = 20', [$_POST['FB']]);
            DB::update('update web set tittle = ? where ID = 21', [$_POST['IG']]);
            DB::update('update web set tittle = ? where ID = 22', [$_POST['TWITTER']]);
            DB::update('update web set tittle = ? where ID = 23', [$_POST['APPLEPODCAST']]);
            DB::update('update web set tittle = ? where ID = 24', [$_POST['GOOGLEPODCAST']]);
            DB::update('update web set tittle = ? where ID = 25', [$_POST['HomeAds1Url']]);
            DB::update('update web set tittle = ? where ID = 26', [$_POST['Home1AdsImg']]);
            DB::update('update web set tittle = ? where ID = 27', [$_POST['Home2AdsUrl']]);
            DB::update('update web set tittle = ? where ID = 28', [$_POST['Home2AdsImg']]);
        }catch(Exception $e){
            echo 'error';
            exit();
        }
        return redirect('/admin/webInfo');
    }

    public function showAdminFiles($pageNumber=1)
    {
        DB::connection('mysql');
        $start = ($pageNumber - 1) * 10;
        //$data = DB::select("SELECT * FROM media ORDER BY media.UploadDate DESC LIMIT ?, 12", [$start]);
        $data = DB::table(DB::raw("(SELECT * FROM media ORDER BY media.UploadDate DESC) as files")) -> paginate(12);;
        //$filesnum = ceil((DB::select("SELECT COUNT(ID) as num FROM media ORDER BY media.UploadDate DESC")[0]->num)/10);
        return view('admin/files', ['username'=>session()->get('username'), 'data'=>$data, 'nowpageNumber'=> $pageNumber]);
    }

    public function deleteFiles()
    {
        DB::connection('mysql');
        $PP = $_POST["mediaid"];
        if (count($PP) > 0) {
            foreach ($PP as $value) {
                $fileinfo = DB::select("SELECT * FROM media WHERE ID=? ORDER BY media.UploadDate DESC", [$value]);
                $delfile = $fileinfo[0]->URL;
                if (is_file("/".$delfile)) {//判斷檔案是否存在
                    //如果存在進行檔案刪除，否則直接刪除資料庫
                    $delfilenum = unlink("/" . $delfile);
                }else{
                    $delfilenum=1;
                }
                DB::delete('DELETE FROM media WHERE ID=?', [$value]);
            }
        }
        return redirect('/admin/files');
    }

    public function showUploadFiles()
    {
        return view('admin/uploadFiles', ['username'=>session()->get('username'), 'data'=>'false']);
    }

    public function uploadFiles()
    {
        DB::connection('mysql');
        //$fileis = $_POST['myFile'];
        $fileinfo = $_FILES['myFile'];
        $filetype = array('jpeg', 'jpg', 'gif', 'png', 'PNG');
        $maxsize = 3097152;
        $ext = pathinfo($fileinfo['name'], PATHINFO_EXTENSION);
        $uniName = md5(uniqid(microtime(true), true)) . "." . $ext;
        $des = "uploadfile/".$uniName;

        if (!in_array($ext, $filetype)) {
            print("非法副檔名");
            exit();
        }

        if ($fileinfo['size'] > $maxsize) {
            print("檔案超過大小限制!");
            exit();
        }
        if (!move_uploaded_file($fileinfo['tmp_name'], $des)) {
            print("檔案從暫存區移動至資料夾失敗");
            exit();
        }
        $filename = $uniName;
        $fileURL = '/'.$des;
        date_default_timezone_set('Asia/Taipei');
        $fileUploadDate = date("Y-m-d");
        $filecap = $fileinfo['size'];
        DB::insert("INSERT INTO media (Name,URL,UploadDate,Type,Cap) VALUES (?, ?, ?, ?, ?)",  [$filename,$fileURL,$fileUploadDate,$ext,$filecap]);
        return view('admin/uploadFiles', ['username'=>session()->get('username'), 'data'=>$fileURL]);
    }

    public function showEditPost($postID = null)
    {

        DB::connection('mysql');
        $allCategory =  $this -> postService -> GetAllPublicCategory();

        if($postID=="new")
        {

            $postData = array('autor'=>$this -> userService -> GetUserData(session('username'))[0]->Yourname, 'date'=>Carbon::now()->setTimezone("Asia/Taipei")->toDateTimeString());

        }
        else if(preg_match("/^([0-9]+)$/", $postID))
        {

            $postData = DB::select("SELECT * FROM Blog where PostId =?", [$postID]);
            $userData = $this -> userService -> GetUserData(session('username'));
            if($userData[0]->Law_Post == 1){
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
            $start = ($pageNumber - 1) * 10;
            $listData = DB::select("SELECT * FROM Blog WHERE UserID=? ORDER BY Blog.PostDate DESC LIMIT ?, 10", [session('username'), $start]);
            $postNum = ceil(DB::select("SELECT count(PostId) as num FROM Blog WHERE UserID=?", [session('username')])[0]->num/10);
        }else if($userData[0]->Law_Post == 2){
            $listData = $this -> postService -> GetAllPost();
            //$postNum = ceil(PostController::getAllPostNum()[0]->num/10);
        }

        //判斷使用者權限，是否可以編輯他人的文章
        return view('admin/posts', ['username'=>session()->get('username'), 'listData'=>$listData]);
    }

    public function updatePost($postID)
    {
        DB::connection('mysql');
        $userData = $this -> userService -> GetUserData(session('username'));
        if($userData[0]->Law_Post == 1){
            if(!(DB::select("SELECT * FROM Blog WHERE PostId=?", [$postID])[0]->UserID==session('username'))){
                return redirect('/');
            }
        }
        DB::update('UPDATE Blog SET Competence = ?,PostTittle = ?, PostDate = ?, PostContant = ?, Classes = ?, Reply = ?, ClassId = ?, ReadTime = ?, CoverImage = ? WHERE `Blog`.`PostId` = ?', [$_POST['competance'], $_POST['postTitle'], $_POST['date'], $_POST['cont'], "", $_POST['reply'], $_POST['Classes'], $_POST['ReadTime'], $_POST['CoverImage'], $postID]);
        return redirect('/admin/editPost/'.$postID);
    }

    public function newPost()
    {
        DB::connection('mysql');
        DB::insert("INSERT INTO Blog (Competence, PostTittle, PostDate, PostContant, Classes, User, Reply, UserID, ClassId, ReadTime, CoverImage) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )", [$_POST['competance'], $_POST['postTitle'], $_POST['date'], $_POST['cont'], "",  $this -> userService -> GetUserData(session('username'))[0]->Yourname,$_POST['reply'], session('username'), $_POST['Classes'], $_POST['ReadTime'], $_POST['CoverImage']]);
        return redirect('/admin/editPost');
    }

    public function deletePost()
    {
        DB::connection('mysql');
        $delPostId = (isset($_POST['postid']) ? $_POST['postid'] : '');
        if($delPostId == ''){

        }else{
            foreach($delPostId as $value){
                DB::delete("DELETE FROM Blog WHERE PostId = ?", [$value]);
            }

        }
        return redirect('/admin/editPost');
    }

    public function CategoryDetailEdit($classId = null)
    {
        $categoryData = $this -> postService -> GetCategoryDetail($classId);
        return view('admin/editCategoryDetail', ['username'=>session()->get('username'), 'categoryData'=>$categoryData]);
    }

    public function UpdateCategoryDetail($classId = null)
    {
        DB::connection('mysql');
        DB::update("UPDATE BClasses SET ClassName = ?, Short_Intro = ?, Long_Intro = ?  WHERE ClassId = ?", [$_POST['ClassName'], $_POST['shortIntro'], $_POST['longIntro'], $classId]);
        return redirect('/admin/editCategoryDetail/'.$classId);
    }

    public function showAdminCategory()
    {
        $allCategory = $this -> postService -> GetAllCategory();
        return view('admin/categoryEdit', ['username'=>session()->get('username'), 'allCategory'=>$allCategory]);
    }

    public function updateCategory()
    {
        DB::connection('mysql');
        if($_POST['action']=='new'){

            if(!empty($_POST['newName']) && !empty($_POST['newOrder'])){

                DB::insert("INSERT INTO BClasses (ClassName, SorH, OrderID, Short_Intro, Long_Intro) VALUES ( ?, 'show', ?, '', '' )",[$_POST['newName'], $_POST['newOrder']]);

            }

        }else if($_POST['action']=='update' || $_POST['action']=='setShow' || $_POST['action']=='setHide' || $_POST['action']=='delete'){

            $checkedItem = $_POST['classid'];
            $checkedClassName = $_POST['ClassName'];
            $checkedOrder = $_POST['order'];

            if(!isset($checkedItem)){
                return redirect('/admin/editCategory');

            }else if($_POST['action']=='update'){

                foreach($checkedItem as $value){

                    DB::update("UPDATE BClasses SET ClassName = ?, OrderID = ? WHERE `BClasses`.`ClassId` = ?", [$checkedClassName[$value], $checkedOrder[$value], $value]);

                }

            }else if($_POST['action']=='setShow'){

                foreach($checkedItem as $value){

                    DB::update("UPDATE BClasses SET SorH = 'show' WHERE `BClasses`.`ClassId` = ?", [$value]);

                }

            }else if($_POST['action']=='setHide'){

                foreach($checkedItem as $value){

                    DB::update("UPDATE BClasses SET SorH = 'hide' WHERE `BClasses`.`ClassId` = ?", [$value]);

                }

            }else if($_POST['action']=='delete'){

                foreach($checkedItem as $value){

                    //刪除該分類下的文章
                    DB::delete("DELETE FROM Blog WHERE ClassId = ?", [$value]);
                    DB::delete("DELETE FROM BClasses WHERE ClassId = ?", [$value]);

                }

            }

        }
        return redirect('/admin/editCategory');

    }

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

    public function showEditAccount($username = null)
    {
        DB::connection('mysql');
        if($username=="new"){

            return view('admin/accountEdit', ['username'=>session()->get('username')]);

        }else if(isset($username)){
            $userData = $this -> userService -> GetUserData($username);
            if(!(count($userData) > 0)){
                return redirect('/admin/editAccount');
            }
            return view('admin/accountEdit', ['username'=>session()->get('username'), 'userData'=> $userData]);
        }else{
            $allUser = DB::select("select * from admin");
            return view('admin/accounts', ['username'=>session()->get('username'), 'allUser'=> $allUser]);
        }
    }

    public function addAccount()
    {
        DB::connection('mysql');
        if(count($this -> userService -> GetUserData($_POST['username'])) > 0){
            return redirect('/admin/editAccount');
        }else{
            DB::insert("INSERT INTO admin (username,pw,Email,Yourname,IntroductionSelf,Position, Law_WebInfo, Law_Files, Law_Post, Law_Category, Law_News, Law_Users, Law_Page, Law_Nav, Law_Works) VALUES (?, ?, ?, ?, '這個人太懶了，還沒有新增自介！', 'on', ?, ?, ?, ?, ?, ?, ?, ?)", [$_POST['username'], password_hash($_POST['pw'], PASSWORD_DEFAULT), $_POST['Email'], $_POST['Yourname'], $_POST['Law_webInfo'], $_POST['Law_files'], $_POST['Law_post'], $_POST['Law_Category'], $_POST['Law_News'], $_POST['Law_Account'], $_POST['Law_Page'], $_POST['Law_Nav'], $_POST['Law_Works']]);
            return redirect('/admin/editAccount');
        }
    }

    public function updateAccount($username)
    {
        DB::connection('mysql');
        DB::update("update admin set Law_WebInfo = ?, Law_Files = ?, Law_Post = ?, Law_Category = ?, Law_News = ?, Law_Users = ?, Law_Page = ?, Law_Nav = ?, Law_Works = ? where username = ?", [$_POST['Law_webInfo'], $_POST['Law_files'], $_POST['Law_post'], $_POST['Law_Category'], $_POST['Law_News'], $_POST['Law_Account'], $_POST['Law_Page'], $_POST['Law_Nav'], $_POST['Law_Works'], $username]);
        return redirect('/admin/editAccount');
    }

    public function deleteAccount()
    {
        DB::connection('mysql');
        if(!empty($_POST['username'])){
            $delAccount = $_POST['username'];
            foreach($delAccount as $v){
                //刪除使用者文章
                DB::delete("delete from Blog where UserID=?", [$v]);
                DB::delete("delete from admin where username=?", [$v]);
            }
        }

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
