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
Route::get('/', 'PostController@getPostList')->name('index');

//post
Route::get('/post', 'PostController@getPostList')->name('post');
Route::get('/post/p/{pageNumber}', 'PostController@getPostList')->where('pageNumber', '[0-9]+')->name('post');
Route::get('/post/{postID}', 'PostController@getOnePost')->where('postID', '[0-9]+')->name('post');

//category
Route::get('/category/{classID}', 'PostController@getallCategorypost')->where('classID', '[0-9]+')->name('{classID}');
Route::get('/category/{classID}/p/{pageNumber}', 'PostController@getallCategorypost')->where('classID', '[0-9]+')->where('pageNumber', '[0-9]+');

//page
Route::get('/page/{pageID}','PageController@getPage')->where('pageID', '[0-9A-Za-z]+')->name('page/'.'{pageID}');

//whatnews
Route::get('/whatsnews/{postID}','WhatNewsController@getOnePost')->where('pageID', '[0-9]+');
Route::get('/whatsnews','WhatNewsController@getHomePost');

//Person
Route::get('person/{userID}', 'UserController@getUserPage')->where('userID', '[0-9A-Za-z]+');
Route::get('person/{userID}/post', 'UserController@getUserPage')->where('userID', '[0-9A-Za-z]+');
Route::get('person/{userID}/post/p/{pageNumber}', 'UserController@getUserPagePost')->where('userID', '[0-9A-Za-z]+')->where('pageNumber', '[0-9]+');

//Search
Route::get('search', 'SearchController@searchPage');
Route::get('search/q', 'SearchController@search');


/*後台路由admin*/
/*登入登出 */
/*基本上設計一個錯誤與成功的view */
Route::get('login', 'UserController@loginPage');

Route::post('login', 'UserController@login');

Route::get('logout', 'UserController@logout');

/*後台首頁*/
Route::get('admin', 'AdminController@showAdminIndex');
Route::get('admin/webInfo', 'AdminController@showAdminWebInfo');
Route::post('admin/updateWebInfo','AdminController@updateWebInfo');

/*Files*/
Route::get('admin/files/{pageNumber?}', 'AdminController@showAdminFiles') -> where('pageNumber', '[0-9]+');;
Route::post('admin/deleteFiles','AdminController@deleteFiles');
Route::get('admin/uploadFiles','AdminController@showUploadFiles');
Route::post('admin/uploadFiles','AdminController@uploadFiles');

/*文章相關*/

Route::post('admin/updatePost/{postID}', 'AdminController@updatePost')->where('postID', '[0-9]+');

Route::post('admin/delPost', 'AdminController@deletePost');

Route::post('admin/newPost', 'AdminController@newPost');

Route::get('admin/editPost/{postID?}', 'AdminController@showEditPost')->where('postID', '[0-9A-Za-z]+');

Route::get('admin/editPost/p/{pageNumber}', 'AdminController@showEditPostList')->where('pageNumber', '[0-9]+');

//分類
Route::get('admin/editCategory', 'AdminController@showAdminCategory');
Route::post('admin/updateCategory', 'AdminController@updateCategory');

/*公告相關*/

Route::post('admin/updateNews/{postID}', 'AdminController@updateNews')->where('postID', '[0-9]+');

Route::post('admin/delNews', 'AdminController@deleteNews');

Route::post('admin/newNews', 'AdminController@newNews');

Route::get('admin/editNews/{postID?}', 'AdminController@showEditNews')->where('postID', '[0-9A-Za-z]+');

Route::get('admin/editNews/p/{pageNumber}', 'AdminController@showEditNewsList')->where('pageNumber', '[0-9]+');

/*使用者*/
Route::get('admin/editAccount/{username?}', 'AdminController@showEditAccount')->where('username', '[0-9A-Za-z]+');
Route::post('admin/updateAccount/{username}', 'AdminController@updateAccount')->where('username', '[0-9A-Za-z]+');
Route::post('admin/addAccount', 'AdminController@addAccount');
Route::post('admin/deleteAccount', 'AdminController@deleteAccount');

/*頁面*/
Route::get('admin/editPage/{pageID?}', 'AdminController@showEditPage')->where('pageID', '[0-9A-Za-z]+');
Route::post('admin/updatePage/{pageID}', 'AdminController@updatePage')->where('pageID', '[0-9A-Za-z]+');
Route::post('admin/newPage', 'AdminController@newPage');
Route::post('admin/deletePage', 'AdminController@deletePage');

/*導航*/

Route::get('admin/editNav/{type?}', 'AdminController@showEditNav');
Route::post('admin/updateNav/{type}', 'AdminController@updateNav');



/*個人化設定*/
Route::get('admin/mySetting', 'AdminController@showMysettingPage');
Route::post('admin/updateMySetting', 'AdminController@updateMysetting');


//Auth::routes();
