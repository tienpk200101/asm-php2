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

Route::get('/', 'Client\HomeController@index')->name('route_Fontend_Home');


//Route::post('postFile', [MyController::class, 'uploadFile'])->name('postFile');

Route::get('/login', 'Client\AccountController@login')->name('login');
Route::post('/login', 'Client\AccountController@saveLogin');
Route::get('/register', 'Client\AccountController@register');
Route::post('/register/add', 'Client\AccountController@saveRegister');
Route::get('/logout', 'Client\AccountController@logout');

Route::get('/admin/login', 'Admin\LoginController@getLoginAdmin')->name('login');
Route::post('/admin/login', 'Admin\LoginController@postLoginAdmin');
Route::get('/admin/logout', 'Admin\LoginController@getLogout');
Route::get('admin/register', function (){
    return view('admin.auth.register');
});

//FRONTEND
Route::controller('FrontEnd\FrontEndController')->group(function(){
    Route::get('/', 'index')->name('Route_FrontEnd_Index');
    Route::get('/shoppage', 'shopPage')->name('Route_FrontEnd_ShopPage');
    Route::get('/product/{id}', 'detail')->name('Route_FrontEnd_Detail');
});



// BACKEND
Route::middleware(['auth'])->group(function (){
    Route::prefix('/admin')->group(function (){

        Route::get('/dashboard', function () {
            return view('admin.layouts.main', ['title'=>'Dashboard']);
        });

//      Product
        Route::prefix('/product')->group(function(){
//            Controller Product
            Route::controller('Admin\ProductController')->group(function (){
                Route::get('/', 'index')->name('admin_product'); // get list product

                Route::get('/add', 'create')->name('add_product'); // get add form product

                Route::post('/add', 'store')->name('handle_product'); // add product

                Route::get('/detail/{id}', 'edit')->name('route_BackEnd_Product_Detail'); // get detail product

                Route::post('/update/{id}', 'update')->name('route_BackEnd_Product_Update'); // post update product

                Route::get('/delete/{id}', 'destroy')->name('route_BackEnd_Product_Destroy'); // delete product

            });

        });
//      Category
        Route::prefix('/categories')->group(function (){
            Route::controller('Admin\CategoriesController')->group(function(){
                Route::get('/', 'index')->name('route_BackEnd_Category_List');// List categories

                Route::post('/add', 'store')->name('route_BackEnd_Category_Post');// Add categories

                Route::get('/detail/{id}', 'edit')->name('route_BackEnd_Category_Detail');// Categories detail

                Route::post('/update/{id}', 'update')->name('route_BackEnd_Category_Update');// Categories Update

                Route::get('/delete/{id}', 'destroy')->name('route_BackEnd_Category_Destroy');// Categories Update
            });
        });

//        User
        Route::prefix('/users')->group(function (){
            Route::controller('Admin\UsersController')->group(function (){
                Route::get('/', 'index')->name('Route_BackEnd_User_List'); // List User

                Route::get('/detail/{id}', 'show')->name('Route_BackEnd_User_Detail'); // Detail User
            });
        });

//        Banner
        Route::prefix('/banners')->group(function (){
            Route::controller('Admin\BannerController')->group(function(){
                Route::get('/', 'index')->name('Route_BackEnd_Banner_List'); // get list banner
                Route::get('/add', 'create')->name('Route_BackEnd_Banner_Add'); // get list banner
                Route::post('/add', 'store')->name('Route_BackEnd_Banner_Post'); // Post Banner
                Route::get('/detail/{id}', 'edit')->name('Route_BackEnd_Banner_Detail'); // Get Form Edit Banner
                Route::post('/update/{id}', 'update')->name('Route_BackEnd_Banner_Update'); // Update Banner
                Route::get('/delete/{id}', 'destroy')->name('Route_BackEnd_Banner_Destroy'); // delete Banner
            });
        });

        // Staff
        Route::prefix('staffs')->group(function(){
            Route::controller('Admin\StaffController')->group(function(){
                Route::get('/', 'index')->name('Route_BackEnd_Staff_List'); // get list staff
                Route::get('add', 'create')->name('Route_BackEnd_Staff_Add'); //Get form add staff
                Route::post('add', 'store')->name('Route_BackEnd_Staff_Post'); //Get form add staff
            });
        });
    });
});
