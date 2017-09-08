<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view("welcome");
});
Route::get("/post/{id}",["as"=>"home.post","uses"=>"AdminPostsController@post"]);
Route::group(["middleware" => "admin"],function(){
    Route::get('/admin', function (){
        return view("admin.index");
    });
    Route::resource("admin/users","AdminUsersController",["names"=>[
        "index" => "admin.users.index",
        "show" => "admin.users.show",
        "create" => "admin.users.create",
        "store" => "admin.users.store",
        "edit" => "admin.users.edit",
        "delete" =>"admin.users.delete"
     ]]);
    Route::resource("admin/posts","AdminPostsController",["names" => [
        "index" => "admin.posts.index",
        "show" => "admin.posts.show",
        "create" => "admin.posts.create",
        "store" => "admin.posts.store",
        "edit" => "admin.posts.edit",
        "delete" =>"admin.posts.delete"

    ]]);
    Route::resource("admin/category","AdminCategoriesController",["names" => [
        "index" => "admin.category.index",
        "show" => "admin.category.show",
        "create" => "admin.category.create",
        "store" => "admin.category.store",
        "edit" => "admin.category.edit",
        "delete" =>"admin.category.delete"
    ]]);
    Route::resource("admin/media","AdminMediaController",["names" => [
        "index" => "admin.media.index",
        "show" => "admin.media.show",
        "create" => "admin.media.create",
        "store" => "admin.media.store",
        "edit" => "admin.media.edit",
        "delete" =>"admin.media.delete"
    ]]);
    Route::delete("admin/delete/media","AdminMediaController@deleteMedia");


    Route::resource("admin/comments","PostCommentController",["names" => [
        "index" => "admin.comments.index",
        "create" => "admin.comments.create",
        "show" => "admin.comments.show",
        "store" => "admin.comments.store",
        "edit" => "admin.comments.edit",
        "delete" =>"admin.comments.delete"
    ]]);
    Route::resource("admin/comments/replices","CommentRepliesController",["names" => [
        "index" => "admin.comments.replices.index",
        "show" => "admin.comments.replices.show",
        "create" => "admin.comments.replices.create",
        "store" => "admin.comments.replices.store",
        "edit" => "admin.comments.replices.edit",
        "delete" =>"admin.comments.replices.delete"
    ]]);
});
Route::get('/logout', 'Auth\LoginController@logout');
Route::group(["middleware" => "admin"],function(){
    Route::post("comment/reply","CommentRepliesController@createReply");
});