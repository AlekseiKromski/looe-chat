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




Route::group(['middleware' => 'guest'], function (){
    Route::get("/", "GuestController@index")->name('login');
    Route::get("/login", "GuestController@index");
    Route::post("/login", "Auth\LoginController@login");
    Route::get("/register", "GuestController@register")->name('register-page');
    Route::post("/register", "Auth\RegisterController@register");
});


Route::group(['middleware' => 'auth', 'prefix' => 'looechat'], function (){
    Route::get('/', "UserController@index");
    Route::get('/send-message', "UserController@sendMessage");
    Route::get('/send-private-message', "UserController@sendPrivateMessage");
    Route::get('/add-user/{id}', "UserController@addUser");
    Route::get('/get-messages/{id}', "UserController@getMessages");
    Route::get('/get-private-messages/{id}', "UserController@getPrivateMessages");
    Route::get('/get-chat-info/{id}', "UserController@getChatInfo");
    Route::get('/get-user-chat-rooms', "UserController@getUserChatRooms");
    Route::get('/get-user-chat-privates', "UserController@getUserChatPrivates");
    Route::get('/join/{id}', "UserController@joinUserIntoChat");
    Route::get("/logout", "Auth\LoginController@logout")->name('logout');
});
