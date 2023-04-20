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

/*前台路由*/
//root
Route::get('/', 'PostController@getHomePage')->name('index');

//post
Route::get('/post', 'PostController@getPostList')->name('post');
Route::get('/post/p/{pageNumber}', 'PostController@getPostList')->where('pageNumber', '[0-9]+')->name('post');
Route::get('/post/{postID}', 'PostController@getOnePost')->where('postID', '[0-9]+')->name('post');

//category
Route::get('/category/{classID}/', 'PostController@getallCategorypost')->where('classID', '[0-9]+')->name('{classID}');
Route::get('/category/{classID}/intro', 'PostController@getCategoryDetailPage')->where('classID', '[0-9]+');

//page
Route::get('/page/{pageID}','PageController@getPage')->where('pageID', '[0-9A-Za-z]+')->name('page/'.'{pageID}');

//AllAuthorPage
Route::get('/authors','UserController@getAllAuthorPage')->name('authors');

//whatnews
/*
Route::get('/whatsnews/{postID}','WhatNewsController@getOnePost')->where('pageID', '[0-9]+');
Route::get('/whatsnews','WhatNewsController@getHomePost');*/

//Person
Route::get('person/{userID}', 'UserController@getUserPage')->where('userID', '[0-9A-Za-z]+');
Route::get('person/{userID}/post', 'UserController@getUserPage')->where('userID', '[0-9A-Za-z]+');
Route::get('person/{userID}/post/p/{pageNumber}', 'UserController@getUserPagePost')->where('userID', '[0-9A-Za-z]+')->where('pageNumber', '[0-9]+');

//Search
Route::get('search', 'SearchController@searchPage');
Route::get('search/q', 'SearchController@search');

//Works
Route::get('works/{WorksPID}', 'WorksController@GetWorksDetailPage')->where('WorksPID', '[0-9A-Za-z]+');
Route::get('works', 'WorksController@GetAllWorksPage');


/*後台路由admin*/
/*登入登出 */
/*基本上設計一個錯誤與成功的view */
Route::get('login', 'UserController@loginPage');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');

/*後台首頁*/
Route::get('admin', 'AdminController@showAdminIndex')->middleware('userAuth:other');
Route::get('admin/webInfo', 'AdminController@showAdminWebInfo')->middleware('userAuth:webInfo');
Route::post('admin/updateWebInfo','AdminController@updateWebInfo')->middleware('userAuth:webInfo');
/*後台留言板*/
//Route::post('admin/updatemb','FirebaseController@newData')->middleware('userAuth:mb');

/*Files*/
Route::get('admin/files/{pageNumber?}', 'AdminController@showAdminFiles') -> where('pageNumber', '[0-9]+')->middleware('userAuth:files');
Route::post('admin/deleteFiles','AdminController@deleteFiles')->middleware('userAuth:files');
Route::get('admin/uploadFiles','AdminController@showUploadFiles')->middleware('userAuth:files');
Route::post('admin/uploadFiles','AdminController@uploadFiles')->middleware('userAuth:files');

/*文章相關*/
Route::post('admin/updatePost/{postID}', 'AdminController@updatePost')->where('postID', '[0-9]+')->middleware('userAuth:post');
Route::post('admin/delPost', 'AdminController@deletePost')->middleware('userAuth:post');
Route::post('admin/newPost', 'AdminController@newPost')->middleware('userAuth:post');
Route::get('admin/editPost/{postID?}', 'AdminController@showEditPost')->where('postID', '[0-9A-Za-z]+')->middleware('userAuth:post');
Route::get('admin/editPost/p/{pageNumber}', 'AdminController@showEditPostList')->where('pageNumber', '[0-9]+')->middleware('userAuth:post');

//分類
Route::get('admin/editCategory', 'AdminController@showAdminCategory')->middleware('userAuth:category');
Route::post('admin/updateCategory', 'AdminController@updateCategory')->middleware('userAuth:category');
Route::get('admin/editCategoryDetail/{classId}', 'AdminController@CategoryDetailEdit')->middleware('userAuth:category');
Route::post('admin/updateCategoryDetail/{classId}', 'AdminController@UpdateCategoryDetail')->middleware('userAuth:category');

/*公告相關
Route::post('admin/updateNews/{postID}', 'AdminController@updateNews')->where('postID', '[0-9]+')->middleware('userAuth:news');
Route::post('admin/delNews', 'AdminController@deleteNews')->middleware('userAuth:news');
Route::post('admin/newNews', 'AdminController@newNews')->middleware('userAuth:news');
Route::get('admin/editNews/{postID?}', 'AdminController@showEditNews')->where('postID', '[0-9A-Za-z]+')->middleware('userAuth:news');
Route::get('admin/editNews/p/{pageNumber}', 'AdminController@showEditNewsList')->where('pageNumber', '[0-9]+')->middleware('userAuth:news');
*/

/*使用者*/
Route::get('admin/editAccount/{username?}', 'AdminController@showEditAccount')->where('username', '[0-9A-Za-z]+')->middleware('userAuth:account');
Route::post('admin/updateAccount/{username}', 'AdminController@updateAccount')->where('username', '[0-9A-Za-z]+')->middleware('userAuth:account');
Route::post('admin/addAccount', 'AdminController@addAccount')->middleware('userAuth:account');
Route::post('admin/deleteAccount', 'AdminController@deleteAccount')->middleware('userAuth:account');

/*頁面*/
Route::get('admin/editPage/{pageID?}', 'AdminController@showEditPage')->where('pageID', '[0-9A-Za-z]+')->middleware('userAuth:page');
Route::post('admin/updatePage/{pageID}', 'AdminController@updatePage')->where('pageID', '[0-9A-Za-z]+')->middleware('userAuth:page');
Route::post('admin/newPage', 'AdminController@newPage')->middleware('userAuth:page');
Route::post('admin/deletePage', 'AdminController@deletePage')->middleware('userAuth:page');

/*導航*/
Route::get('admin/editNav/{type?}', 'AdminController@showEditNav')->middleware('userAuth:nav');
Route::post('admin/updateNav/{type}', 'AdminController@updateNav')->middleware('userAuth:nav');

/*個人化設定*/
Route::get('admin/mySetting', 'AdminController@showMysettingPage')->middleware('userAuth:other');
Route::post('admin/updateMySetting', 'AdminController@updateMysetting')->middleware('userAuth:other');

/* Works 作品集 */
Route::get('admin/works', 'AdminController@GetAllWorksListSetPage')->middleware('userAuth:Works');
Route::get('admin/works/{WorksPID}', 'AdminController@GetWorksDetailSetPage')->middleware('userAuth:Works');
Route::post('admin/updateWorksDetail/{WorksPID}', 'AdminController@SetWorksDetailReturnPage')->middleware('userAuth:Works');
Route::post('admin/deleteWorks', 'AdminController@DeleteWorks')->middleware('userAuth:Works');

//Auth::routes();
