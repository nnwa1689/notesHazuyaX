<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * 
 * 前台路由
 * */

//首頁
Route::get('/', 'PageController@GetHomePage')->name('index');

//文章
Route::get('/blog', 'PostController@getPostList')->name('post');
//Route::get('/post/p/{pageNumber}', 'PostController@getPostList')->where('pageNumber', '[0-9]+')->name('post');
Route::get('/blog/{postID}', 'PostController@getOnePost')->where('postID', '[0-9]+')->name('post');

//文章分類
Route::get('/category/{classID}/', 'PostController@getallCategorypost')->where('classID', '[0-9]+')->name('{classID}');
// 移除文章介紹Route::get('/category/{classID}/intro', 'PostController@getCategoryDetailPage')->where('classID', '[0-9]+');

//頁面
Route::get('/page/{pageID}','PageController@getPage')->where('pageID', '[0-9A-Za-z]+')->name('page/'.'{pageID}');

//搜尋頁面
Route::get('search', 'SearchController@searchPage');
Route::get('search/q', 'SearchController@search');

//作品
Route::get('works/{WorksPID}', 'WorksController@GetWorksDetailPage')->where('WorksPID', '[0-9A-Za-z]+');
Route::get('works', 'WorksController@GetAllWorksPage');

//聯絡
Route::get('contact', 'PageController@GetContactPage');

//關於
Route::get('about', 'PageController@GetAboutPage');

//錯誤頁面
Route::get('error/{statuCode}', 'PageController@GetErrorPage')->where('statuCode', '[0-9A-Za-z]+');

/**
 * 
 * 後台路由admin
 * 
 * */

/*登入登出 */
Route::get('login', 'UserController@loginPage');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');


Route::prefix('admin') -> group(function() {

    /*後台首頁*/
    Route::get('/', 'AdminController@showAdminIndex')->middleware('userAuth:other');
    Route::get('webInfo', 'AdminController@showAdminWebInfo')->middleware('userAuth:webInfo');
    Route::post('updateWebInfo','AdminController@updateWebInfo')->middleware('userAuth:webInfo');
    /*後台留言板*/
    //Route::post('admin/updatemb','FirebaseController@newData')->middleware('userAuth:mb');

    /*Files*/
    Route::get('files/{pageNumber?}', 'AdminController@showAdminFiles') -> where('pageNumber', '[0-9]+')->middleware('userAuth:files');
    Route::post('deleteFiles','AdminController@deleteFiles')->middleware('userAuth:files');
    Route::get('uploadFiles','AdminController@showUploadFiles')->middleware('userAuth:files');
    Route::post('uploadFiles','AdminController@uploadFiles')->middleware('userAuth:files');

    /*文章相關*/
    Route::post('updatePost/{postID}', 'AdminController@updatePost')->where('postID', '[0-9]+')->middleware('userAuth:post');
    Route::post('handlePost', 'AdminController@MultipleHandlePost')->middleware('userAuth:post');
    Route::post('newPost', 'AdminController@newPost')->middleware('userAuth:post');
    Route::get('editPost/{postID?}', 'AdminController@showEditPost')->where('postID', '[0-9A-Za-z]+')->middleware('userAuth:post');
    Route::get('editPost/p/{pageNumber}', 'AdminController@showEditPostList')->where('pageNumber', '[0-9]+')->middleware('userAuth:post');

    //分類
    Route::get('editCategory', 'AdminController@showAdminCategory')->middleware('userAuth:category');
    Route::post('updateCategory', 'AdminController@updateCategory')->middleware('userAuth:category');
    Route::get('editCategoryDetail/{classId}', 'AdminController@CategoryDetailEdit')->middleware('userAuth:category');
    Route::post('updateCategoryDetail/{classId}', 'AdminController@UpdateCategoryDetail')->middleware('userAuth:category');

    /*使用者*/
    Route::get('editAccount/{username?}', 'AdminController@showEditAccount')->where('username', '[0-9A-Za-z]+')->middleware('userAuth:account');
    Route::post('updateAccount/{username}', 'AdminController@updateAccount')->where('username', '[0-9A-Za-z]+')->middleware('userAuth:account');
    Route::post('addAccount', 'AdminController@addAccount')->middleware('userAuth:account');
    Route::post('deleteAccount', 'AdminController@deleteAccount')->middleware('userAuth:account');

    /*頁面*/
    Route::get('editPage/{pageID?}', 'AdminController@showEditPage')->where('pageID', '[0-9A-Za-z]+')->middleware('userAuth:page');
    Route::post('updatePage/{pageID}', 'AdminController@updatePage')->where('pageID', '[0-9A-Za-z]+')->middleware('userAuth:page');
    Route::post('newPage', 'AdminController@newPage')->middleware('userAuth:page');
    Route::post('deletePage', 'AdminController@deletePage')->middleware('userAuth:page');

    /*導航*/
    Route::get('editNav/{type?}', 'AdminController@showEditNav')->middleware('userAuth:nav');
    Route::post('updateNav/{type}', 'AdminController@updateNav')->middleware('userAuth:nav');

    /*個人化設定*/
    Route::get('mySetting', 'AdminController@showMysettingPage')->middleware('userAuth:other');
    Route::post('updateMySetting', 'AdminController@updateMysetting')->middleware('userAuth:other');

    /* Works 作品集 */
    Route::get('works', 'AdminController@GetAllWorksListSetPage')->middleware('userAuth:Works');
    Route::get('works/{WorksPID}', 'AdminController@GetWorksDetailSetPage')->middleware('userAuth:Works');
    Route::post('updateWorksDetail/{WorksPID}', 'AdminController@SetWorksDetailReturnPage')->middleware('userAuth:Works');
    Route::post('deleteWorks', 'AdminController@DeleteWorks')->middleware('userAuth:Works');

});

/*公告相關模組移除*/
//Auth::routes();
