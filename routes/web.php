<?php

use App\Http\Controllers\ArticleManagementController;
use App\Http\Controllers\BaseAdminController;
use App\Http\Controllers\ChEditorController;
use App\Http\Controllers\EditorController;
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

Route::get('/ArticleManagement',[ArticleManagementController::class,'index'])->name('ArticleManagement');
Route::get('/ArticleManagement/deletePost/{id}',[ArticleManagementController::class,'delete'])->name('ArticleManagement.Delete');
Route::get('/ArticleManagement/createPost',[ArticleManagementController::class,'create'])->name('ArticleManagement.Create');
Route::post('/ArticleManagement/createArticle',[ArticleManagementController::class,'createArticle'])->name('ArticleManagement.createArticle');
Route::get('/ArticleManagement/EditPost/{id}',[ArticleManagementController::class,'EditArticle'])->name('ArticleManagement.Edit');
Route::post('/ArticleManagement/EditPost',[ArticleManagementController::class,'EditArticlePost'])->name('ArticleManagement.EditPost');


Route::get('/Editor',[EditorController::class,'CheckPosts'])->name('Editor.CheckPosts');
Route::get('/CreateCategory',[EditorController::class,'CreateCategory'])->name('Editor.CategoryCreate');
Route::post('/CreateCategory',[EditorController::class,'CreateCategoryPost'])->name('Editor.CategoryCreatePostMethod');
Route::get('/changeState',[EditorController::class,'ChangePostState']);
Route::get('/changeEditorState',[EditorController::class,'changeEditorState']);

Route::fallback(function(){
return "404 error";
});


