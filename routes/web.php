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

Route::get('/', function () {
//    return view('welcome');
    return 'Hello World';
});
Route::get('/cache', function() {
    return cache('key');
});
Route::any('/foo', function() {
    return 'Hello World';
});
Route::match([ 'get', 'post' ], '/', function() {
    
});


Route::get('user/[id]', function($id) {
    return 'User' . $id;
});
Route::get('posts/{post}/comments/{comment}', function($postId, $commentId) {
    
});

Route::get('user/{name?}', function($name = null) {
    return $name;
});
Route::get('user/{name?}', function($name = 'Johh') {
    return $name;
});
Route::get('user/{name}', function ($name) {
    
}) -> where('name', '[A-Za-z]+');
Route::get('user/{id}', function ($id) {
    
}) -> where('id', '[0-9]+');
Route::get('user/{id}/{name}', function () {
    
}) -> where([ 'id' => '[0-9]+', 'name' => '[A-Za-z]+' ]);
Route::get('user/profile', 'UserController@showProfile') -> name('profile');


//中间件
Route::group([ 'middleware' => 'auth' ], function() {
    Route::get('/', function() {
        // 使用 Auth 中间件
    });
    Route::get('user/profile', function () {
        // 使用 Auth 中间件
    });
});
//命名空间
Route::group([ 'namespace' => 'Admin' ], function () {
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下
});

//子域名路由
Route::group([ 'domain' => '{account}.myapp.com' ], function() {
    Route::get('user/{id}', function ($account, $id) {
        //    
    });
});
//路由前缀
Route::group([ 'prefix' => 'admin' ], function() {
    Route::get('users', function() {
        // 匹配 "/admin/users" URL
    });
});

//路由模型绑定
Route::get('api/user/{user}', function(App\User $user) {
    return $user -> email;
});
