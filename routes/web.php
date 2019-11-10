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

use App\Post;

Route::get('/', function () {

    $allpost =  Post::all();
       $allpost = App\Post::paginate(2);
    return view('welcome',compact('allpost'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('userprofile/info/{id}','UserController@userinfo');
Route::get('category/add','CategoryController@cateindex')->name('addCategory');
Route::post('category/store','CategoryController@storecate')->name('storecat');
Route::get('category/all','CategoryController@allcate')->name('allcategory');
Route::get('category/post','PostController@postform')->name('addPost');
Route::post('post/store','PostController@poststore')->name('postinsert');
Route::get('post/allpost','PostController@allpostretrive')->name('allpost');
Route::get('post/edit/{id}','PostController@postedit');
Route::post('post/update/{id}','PostController@updatepost');
Route::get('post/delete/{id}','PostController@deletepost');

Route::get('user/usallpost/','PostController@yourallpost')->name('yourpost');
Route::get('single/postview/{id}','PostController@singlepost');


