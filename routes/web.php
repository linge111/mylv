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
// echo "这是laraver框架";die();
Route::get('/', function () {
    return view('welcome');
    // echo date("Y-m-d H:i:s");
});


//登录路由
		Route::get("/login",function()
		{
			return view("Admin.login");
		});

//普通get路由
Route::get("/1",function()
	{
		echo 1;
	});

//post路由
Route::post("/2",function()
{
	echo 2;
});

//ajax get
Route::get("/3",function()
	{
		echo 3;
	});

//ajax post
Route::post("/4",function()
{
	echo 4;
});




/////////
///后台
/////
Route::resource("/dmin","Admin\admin");

//用户
Route::resource("/user","Admin\user");