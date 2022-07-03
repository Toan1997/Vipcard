<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AffiliateController;
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


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
//Custom
    Route::middleware(['check.user.edit'])->group(function () {
        Route::get('user/info/{id?}', ['as' => 'user.info', 'uses' => 'App\Http\Controllers\UserController@info']);
        Route::put('user/info/save',[UserController::class,'saveInfo'])->name('user.info.save');
        Route::post('user/info/save',[UserController::class,'saveLinked'])->name('user.info.save.linked');
    });

    Route::middleware(['check.is.admin'])->group(function () {
        Route::get('affiliate',[AffiliateController::class,'index'])->name('affiliate');
        Route::get('affiliate/create',[AffiliateController::class,'create'])->name('affiliate.create');
        Route::get('affiliate/edit/{id?}',[AffiliateController::class,'edit'])->name('affiliate.edit');
        Route::get('affiliate/delete/{id?}',[AffiliateController::class,'delete'])->name('affiliate.delete');
        Route::put('affiliate/save',[AffiliateController::class,'save'])->name('affiliate.save');
        Route::get('user/active/{id?}', [UserController::class,'active'])->name('user.active');
    });
});
    Route::get('/404',function(){
        return view('error.404');
    });
    Route::get('permission',function(){
        return view('error.permission');
    });
    Route::get('expires',function(){
        return view('error.expires');
    });

