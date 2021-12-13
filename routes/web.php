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

Route::get('/', [App\Http\Controllers\front\Post::class, 'home']);
Route::get('/post/{slug}', [App\Http\Controllers\front\Post::class, 'post']);
Route::view('/contact/','front.contact' );
Route::post('contact/form_submit', [App\Http\Controllers\front\Post::class, 'form_submit']);


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
	Route::get('admin/post/delete/{id}', [App\Http\Controllers\admin\Post::class, 'delete']);
	Route::get('admin/post/edit/{id}', [App\Http\Controllers\admin\Post::class, 'edit']);
	Route::post('admin/post/update/{id}', [App\Http\Controllers\admin\Post::class, 'update']);

	Route::get('admin/page/list', [App\Http\Controllers\admin\Page::class, 'listing']);
	Route::view('admin/page/add', 'admin.page.post_add');
	Route::post('admin/page/submit', [App\Http\Controllers\admin\Page::class, 'submit']);
	Route::get('admin/page/delete/{id}', [App\Http\Controllers\admin\Page::class, 'delete']);
	Route::get('admin/page/edit/{id}', [App\Http\Controllers\admin\Page::class, 'edit']);
	Route::post('admin/page/update/{id}', [App\Http\Controllers\admin\Page::class, 'update']);

	Route::get('admin/contact/list', [App\Http\Controllers\admin\Contact::class, 'listing']);
});


