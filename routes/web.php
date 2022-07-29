<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
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

Route::get('/', function (){
    return view('frontend.layouts.main');
});

Route::get('uploadFile', function (){
    return view('uploadFile');
});

Route::post('postFile', [MyController::class, 'uploadFile'])->name('postFile');

Route::get('/admin/login', 'Admin\LoginController@getLoginAdmin')->name('login');
Route::post('/admin/login', 'Admin\LoginController@postLoginAdmin');
Route::get('/admin/logout', 'Admin\LoginController@getLogout');
Route::get('admin/register', function (){
    return view('admin.auth.register');
});

Route::middleware(['auth'])->group(function (){
    Route::prefix('/admin')->group(function (){

        Route::get('/dashboard', function () {
            return view('admin.layouts.main', ['title'=>'Dashboard']);
        });

//      Product
        Route::prefix('/product')->group(function(){
//          List product
            Route::get('/', 'Admin\ProductController@index')->name('admin_product');
//            Get Add Form
            Route::get('/add', 'Admin\ProductController@create')->name('add_product');
//            Post Add Form
            Route::post('/add', 'Admin\ProductController@store')->name('handle_product');
//            Get Detail Product
            Route::get('/detail/{id}', 'Admin\ProductController@edit')->name('route_BackEnd_Product_Detail');
//            Post Update Product
            Route::post('update/{id}', 'Admin\ProductController@update')->name('route_BackEnd_Product_Update');
        });

//        Categories
        Route::prefix('/categories')->group(function (){
            Route::get('/', 'Admin\CategoriesController@index')->name('route_BackEnd_Category_List');

            Route::post('/add', 'Admin\CategoriesController@store')->name('route_BackEnd_Category_Post');
        });
    });
});
