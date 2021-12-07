<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_auth;

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
    return view('welcome');
});

Route::view('admin/login', 'admin.login');
Route::post('admin/login_submit', [App\Http\Controllers\Admin_auth::class, 'login_submit']);


Route::get('admin/logout', function () {
    session()->forget('BLOG_USER_ID');
    session()->flash('logout','logout successfully');
    return redirect('admin/login');
});

Route::group(['middleware'=>['admin_auth']], function(){
	Route::get('admin/post/list', [App\Http\Controllers\admin\Post::class, 'listing']);
	Route::view('admin/post/add', 'admin.post_add');
	Route::post('admin/post/submit', [App\Http\Controllers\admin\Post::class, 'submit']);
	Route::view('admin/post/edit', 'admin.post_edit');
});