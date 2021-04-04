<?php

use App\Http\Controllers\BaseAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;

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

Route::get('/',[PostController::class,'index'])->name('index');

Route::get('/Articles/{id}',[PostController::class,'post'])->name('selectPost');

Route::get('/setComments',[PostController::class,'saveComment']);
Route::get('/Category/{id}',[PostController::class,'category'])->name('categoryRoute');

Route::post('/newsLetter',[SiteController::class,'saveNewsLetter'])->name('newsLetter');

Route::get('/login', function () {
    return view('bases.login');
})->name('login');

Route::post('/login',[SiteController::class,'login'])->name('login');

Route::get('/register', function () {
    return view('bases.register');
})->name('register');

Route::post('/register',[SiteController::class,'register'])->name('register');

Route::get('/logout',[SiteController::class,'logout'])->name('logout');


Route::get('/baseAdmin',[BaseAdminController::class,'index'])->name('BaseAdmin');
Route::get('/baseAdmin/UserAccess/{id}',[BaseAdminController::class,'roleAccess'])
->name('userAccess');
Route::post('/baseAdmin/EdituserAccess',[BaseAdminController::class,'EditAccess'])
->name('EditAccess');


Route::fallback(function(){
return "404 error";
});







use Illuminate\Support\Facades\Auth;
Route::get('/test1', function () {
return Auth::user()->role;
});
