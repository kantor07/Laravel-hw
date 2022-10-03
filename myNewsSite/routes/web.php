<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SitePageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SocialProvidersController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;


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

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{article}', [NewsController::class, 'show'])
    ->where('article', '\d+')
    ->name('news.show');

Route::get('/category', [CategoryController::class, 'category'])
    ->name('sitePage.categoryNewsPage');


Route::get('/', [SitePageController::class, 'homePage'])
    ->name('sitePage.homePage');


Route::resource('order', OrderController::class);
Route::resource('comment', CommentController::class);

Route::get('/sessions', function() {
    $name = 'example';
    if(session()->has($name)) {
        
        session()->remove($name);
    }
  //  session()->get($name);
    dd(session()->all());
    session()->put($name, 'Test example session');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/account', AccountController::class)->name('account');
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'is_admin'
    ], function() {
        Route::get('/', AdminController::class)->name('index');
        Route::get('/parser', ParserController::class)-> name('parser');
        Route::resource('articles', AdminArticleController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::resource('users', AdminUserController::class);
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/redirect/{driver}', [SocialProvidersController::class, 'redirect'])
    ->where('driver', '\w+')    
    ->name('social.auth.redirect');
     
    Route::get('/auth/callback/{driver}', [SocialProvidersController::class, 'callback'])
    ->where('driver', '\w+');
});