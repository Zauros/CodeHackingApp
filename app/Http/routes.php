<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get("/post/{id}",["as"=>"home.post","uses"=>"AdminPostsController@post"]);
Route::group(["middleware" => "admin"],function(){
    Route::get('/admin', function (){
        return view("admin.index");
    });
    Route::resource("admin/users","AdminUsersController");
    Route::resource("admin/posts","AdminPostsController");
    Route::resource("admin/category","AdminCategoriesController");
    Route::resource("admin/media","AdminMediaController");

    Route::resource("admin/comments","PostCommentController");
    Route::resource("admin/comments/replices","CommentRepliesController");
});
Route::get("/user",function(){
    $user = User::findOrFail(1);
    echo $user->role->name;


});
Route::group(["middleware" => "admin"],function(){
    Route::post("comment/reply","CommentRepliesController@createReply");
});