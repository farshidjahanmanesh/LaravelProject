<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
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

Route::post('/newsLetter',[SiteController::class,'saveNewsLetter'])->name('newsLetter');


Route::fallback(function(){
return "404 error";
});
