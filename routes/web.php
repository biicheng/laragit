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

use App\User;



//測試Route
Route::get('/test', function(){
    $post = App\Post::find(1);
    $post->content = 'Laravel demo 6.0 day 11';
    $post->save();
    return $post;
});

Route::get('/hello-world', function () {
    return view('Hello, Welcome to my Laravel！');
});

Route::get('/about_us', function () {
    return view('about_us', ['name' => '我的Laravel 6.0 專案blade練習.']);
});

Route::get('/inspire', 'InspiringController@inspire');


//雙重防禦，防止作弊
Route::get('posts/{post}/comments/{comment?}', function ($postId, $commentId=null) {
    if(($postId==123||$postId==456) && (string)$commentId=='000'){
        // Route::get('/', function () {
            return view('welcome');
        // });
    }
    else{
        return 'postId 和 commentId 錯誤.';
    }
})->where('post', "['123','456']+")->where('comment', '[0-9]+');


//->where()檢查參數，
// 傳入多個參數可用相對的where，傳入多個參數可用相對的whereru俺查
Route::get('user/{name}/{id}', function ($name, $id) {
    return 'url success.';
})->where('name', '[0-9]+')->where('id', '[a-zA-Z]+');


//與一般路由一樣， ->name('profiles')無作用
Route::get('user/profile', function () {
    return '+++';
})->name('profiles');



//原url: local/public/users，因Route::prefix('flower')->group
//連結url需改成local/public/flower/users
Route::prefix('flower')->group(function () {
    Route::get('users', function () {
        return '123';
    });
});


Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});
Route::get('users/{user}', 'InspiringController@show')->where('user', '[0-9a-zA-Z]+');






//原有Route
Route::get('/', function () {
    return view('welcome');
});

