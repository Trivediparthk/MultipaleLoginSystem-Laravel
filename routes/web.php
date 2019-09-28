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
    
    use Illuminate\Support\Facades\Route;

//    use Illuminate\Routing\Route;

//    Route::get('/', function () {
//        return view('welcome');
//    });

//    Route::group(['middleware' => 'user-auth'], function () {
//    Auth::routes();
    Route::get('account/create', 'UserController@create');
    Route::get('/login', 'UserController@login')->name('login');
    Route::post('account/add', 'UserController@add');
    Route::post('user/validate', 'UserController@validateCredential');
    Route::get('logout', 'UserController@logout');
    
    Route::get('redirect/google', 'UserController@redirectToGoogle');
    Route::get('google/callback', 'UserController@handleGoogleCallback');
    
    Route::get('redirect/facebook', 'UserController@redirectToFacebook');
    Route::get('facebook/callback', 'UserController@handlefacebookCallback');
    
    Route::get('/', 'UserController@index');
    //    });
    

