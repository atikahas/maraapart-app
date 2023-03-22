<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LanguageController;

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

Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Dropdown
Route::get('getState', [DropdownController::class, 'getState']);
Route::get('getDistrict', [DropdownController::class, 'getDistrict']);

//Language Change
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

//Posts
Route::get('posts/form', [PostController::class, 'form'])->name('posts.form');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store'); 
Route::get('posts/search', [PostController::class, 'search'])->name('posts.search');

